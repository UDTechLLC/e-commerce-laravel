<?php
declare (strict_types = 1);

namespace App\Http\Controllers\Admin;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
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
                $query = User::where('email', $value);
                break;
            case 'name':
                $query = User::where('first_name', 'LIKE', '%' . $value . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $value . '%');
                break;
        }
        return $query;
    }
}
