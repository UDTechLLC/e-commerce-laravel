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
        $fractal = new Manager();
        $perPage = $request->get('per_page') ?? self::PER_PAGE_DEFAULT;

        $paginator = Subscription::paginate($perPage);

        $subscriptions = $paginator->getCollection();

        $resource = new Collection($subscriptions, new SubscriptionTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        $data = $fractal->createData($resource)->toArray();

        return response()->json($data);
    }
}
