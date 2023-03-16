<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\admin\UserService;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\CreareUserRequest;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        //
        try {
            $user = $this->userService->getAllUser();
            return view('admin.table_user', compact('user'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreareUserRequest $request)
    {
        //
        try {
            $request = $request->only(['user_name', 'email', 'password', 'phone_number', 'role', 'degree', 'experience']);
            $user = $this->userService->createNewUser($request);
            return redirect(route('user.index'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {
            $user = $this->userService->getUserUpdate($id);
            return view('admin.update_user', compact('user'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, string $id)
    {
        //
        try {
            $request = $request->only(['user_name', 'phone_number', 'degree', 'experience', 'role']);
            $updateInfo = $this->userService->updateInfoUser(['request' => $request, 'id' => $id]);
            return redirect(route('user.index'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $deleteUser = $this->userService->deleteUser($id);
            return redirect(route('user.index'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }
}
