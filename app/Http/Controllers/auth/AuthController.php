<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthService;

class AuthController extends Controller
{
    /**
     * Store a new blog post.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return Illuminate\Http\Response
     */

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showFormRegister(Request $request)
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only(['email', 'password', 'select']);
        $user = $this->authService->register($data);

        $user = User::orderByDesc('id')->first();
        $email = new SendMail($user);
        Mail::to('namtruong446@gmail.com')->send($email);

        return redirect(route('show_form.login'))->with('sucess', 'Register success, login now !');
    }

    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->only(['email', 'password']);
        $role = $this->authService->login($data);

        if ($role == 0) {
            return redirect(route('candidate.index'));
        } else {
            return redirect(route('employer.index'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('show_form.login'));
    }
}
