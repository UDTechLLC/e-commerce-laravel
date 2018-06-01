<?php

declare(strict_types = 1);

namespace App\Responses;

use App\Models\Subscription;
use App\Transformers\Api\SubscriptionTransformer;
use Illuminate\Contracts\Support\Responsable;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class SubscriptionResponse implements Responsable
{
    const PER_PAGE_DEFAULT = 20;

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        $sortField = $request->get('sortField') ?? 'id';
        $sortType = $request->get('sortType') ?? 'asc';
        $searchField = $request->get('searchField');
        $searchValue = $request->get('searchValue');

        $fractal = new Manager();
        $perPage = $request->get('per_page') ?? self::PER_PAGE_DEFAULT;

        $paginator = $this->search($searchField, $searchValue)->orderBy($sortField, $sortType)->paginate($perPage);

        $subscriptions = $paginator->getCollection();

        $resource = new Collection($subscriptions, new SubscriptionTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        $data = $fractal->createData($resource)->toArray();

        return response()->json($data);
    }

    /**
     * @param string $field
     * @param string $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function search($field, $value)
    {
        $query = Subscription::query();

        switch ($field) {
            case 'id':
                $query = Subscription::where('id', $value);
                break;
            case 'email':
                $query = Subscription::whereHas('user', function ($query) use ($value) {
                    $query->where('email', $value);
                });
                break;
            case 'name':
                $query = Subscription::whereHas('user', function ($query) use ($value) {
                    $query->where('first_name', 'LIKE', '%' . $value . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $value . '%');
                });
                break;
        }
        return $query;
    }
}
