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
            'email' => 'required|unique:users,email'
        ]);
       return User::Create([
            'name' =>request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
    }
    public function update(User $user){
        request()->validate([
            'email'=>'required|unique:users,email,'. $user->id,
        ]);
         $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password') ? bcrypt(request('password')) : $user->password,
        ]);
        return $user;
    }
}
