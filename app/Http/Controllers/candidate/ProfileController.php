<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\candidate\ProfileService;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Image;
use Throwable;

class ProfileController extends Controller
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
            $img = $this->profileService->getImg();
            $user = $this->profileService->getInfoUser();
            return view('candidate.profile', compact('user', 'img'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    public function update(UpdateProfileRequest $request, string $id)
    {
        //
        try {
            $requestImg = $request->only(['file']);
            if ($requestImg) {
                $img = $this->profileService->createImg($requestImg);
            }
            $request = $request->only(['id', 'user_name', 'phone_number', 'degree', 'experience']);
            $data = $this->profileService->updateInfo($request);
            return redirect(route('profile.index'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }
}
