<?php

namespace App\Services\candidate;

use App\Models\Cv;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Image;


class ProfileService
{
    protected $user;
    protected $image;

    public function __construct(User $user, Image $image)
    {
        $this->user = $user;
        $this->image = $image;
    }

    public function getInfoUser()
    {
        $infor = $this->user->getInfoUser();
        return $infor;
    }

    public function updateInfo($data)
    {
        $updateInfo = $this->user->updateInfo($data);
        return $updateInfo;
    }

    public function createImg($data) {
        $img = $this->image->createImg($data);
        return $img;
    }

    public function getImg() {
        return $this->image->getImg();
    }
}
