<?php
declare (strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Resources\Admin\UsersResource;
use Illuminate\Contracts\View\View;
use \App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view("admin.users.index");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getUsers(Request $request)
    {
        $sortField = $request->get('sortField') ?? 'id';
        $sortType = $request->get('sortType') ?? 'asc';
        $searchField = $request->get('searchField');
        $searchValue = $request->get('searchValue');

        $users = $this->search($searchField, $searchValue);

        return UsersResource::collection($users->orderBy($sortField, $sortType)->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'email'      => $request->get('email'),
            'password'   => bcrypt($request->get('password')),
        ]);

        $user->saveImageBase64($request->get('image'), 'avatar');
        $user->attachRole(2);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user->toJson()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'email'      => $request->get('email'),
            'password'   => ($request->get('password')) ? bcrypt($request->get('password')) : $user->password
        ]);

        if ($request->has('image') && $this->checkImage($request->get('image'))) {
            $user->updateImageBase64($request->get('image'), 'avatar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    /**
     * @param string $field
     * @param string $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function search($field, $value)
    {
        $query = User::query();

        switch ($field) {
            case 'id':
                $query = User::where('id', $value);
                break;
            case 'email':
                $query = User::where('email', 'LIKE', "%$value%");
                break;
            case 'name':
                $query = User::where('first_name', 'LIKE', '%' . $value . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $value . '%');
                break;
        }

        return $query;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private function checkImage($value): bool
    {
        return substr($value, 0, 1) == 'd';
    }
}
