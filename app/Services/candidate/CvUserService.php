<?php

namespace App\Services\candidate;

use App\Models\Cv;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\CvUser;


class CvUserService
{
    protected $cvUser;

    public function __construct(CvUser $cvUser)
    {
        $this->cvUser = $cvUser;
    }

    public function addCandidateApply($data) {
        $candidateApply = $this->cvUser->addCandidateApply($data);
    }

}
