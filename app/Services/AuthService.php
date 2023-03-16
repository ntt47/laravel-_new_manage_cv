<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthService
{
    public function register($data)
    {   
       $user = [
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'role' =>$data['select'],
       ];
        $users = User::create($user);
        return $user;
    }

    public function login($data)
    {   
       if(!Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
            return redirect(route('show_form.login'))->with('error', 'User account or password incorrect');
       }else {
            $role = User::where('id', auth()->id())->pluck('role')->first();
            return $role;
       }
    }
}
