<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\candidate\ProfileService;
use App\Http\Requests\UpdateProfileRequest;
use Throwable;

class ProfileEmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index()
    {
        //
        try {
            $user = $this->profileService->getInfoUser();
            return view('employer.profile', compact('user'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    public function update(UpdateProfileRequest $request, string $id)
    {
        //
        try {
            $request = $request->only(['id', 'user_name', 'phone_number', 'degree', 'experience']);
            $data = $this->profileService->updateInfo($request);
            return redirect(route('profileEmployer.index'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }
}
