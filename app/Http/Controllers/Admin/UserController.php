<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->get();

        return $users;
    }
    public function store(){
        // return request();
        request()->validate([
            'name' => 'required|regex:pattern',
            'email' => 'required|unique:users,email',
            'password'=>'required|confirmed|min:6',
        ]);
       return User::Create([
            'name' =>request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
    }
    public function update(User $user){
        request()->validate([
            'name' => 'required|regex:pattern',
            'email'=>'required|unique:users,email,'. $user->id,
            'password'=>'required|confirmed|min:6',
        ]);
         $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password') ? bcrypt(request('password')) : $user->password,
        ]);
        return $user;
    }
}
