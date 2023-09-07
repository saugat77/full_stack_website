<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $searchquery = request('query');
        $users = User::query()
                        ->when(request('query'),function($query, $searchquery){
                            $query->where('name','like','%'.$searchquery .'%');
                        })
                        ->with('roles')
                        ->latest()
                        ->paginate(8);

        return $users;
    }

    public function allRoles()
    {
        $allRoles = Role::all();
        return response()->json($allRoles);
    }
    public function store()
    {
        // return request();
        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',

        ]);
         $user = User::Create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        $user->assignRole('user');
        return $user;
    }
    public function update(User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:6',
            // 'confirm_password' => 'sometimes|same:password|min:6'
            'roles' => 'required',
        ]);
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password') ? bcrypt(request('password')) : $user->password,
        ]);
        $user->roles()->sync(request('roles'));


        return $user;
    }
    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
