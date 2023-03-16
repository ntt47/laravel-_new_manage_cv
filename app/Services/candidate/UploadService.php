<?php

namespace App\Services\candidate;

use App\Models\Cv;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;


class UploadService
{
    protected $cv;

    public function __construct(Cv $cv)
    {
        $this->cv = $cv;
    }

    public function uploadCv($data)
    {
        $cv = $this->cv->uploadCv($data);
        return $cv;
    }

    public function getCv()
    {
        $cv = $this->cv->getCv();
        return $cv;
    }

    public function viewFile($data)
    {
        $path = Storage::path('public/' . $data);
        return response()->file($path, [
            'Content-Type' => 'application/pdf'
        ]);
    }

    public function pickMainCv($data)
    {
        $statusCv = $this->cv->pickMainCv($data);
    }
}
