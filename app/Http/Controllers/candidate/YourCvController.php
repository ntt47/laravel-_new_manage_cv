<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\candidate\IndexService;
use Illuminate\Support\Facades\Storage;
use App\Models\Cv;
use App\Services\candidate\UploadService;
use Throwable;

class YourCvController extends Controller
{
    //
    protected $indexService;
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        try {
            $id = Cv::where('status', 1)->pluck('id');
            $cvs = $this->uploadService->getCv();
            return view('candidate.your_cv', compact('cvs', 'id'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    public function viewFile()
    {
        try {
            $request = request()->fileName;
            $viewFile = $this->uploadService->viewFile($request);
            return $viewFile;
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    public function pickMainCv(Request $request)
    {
        try {
            $request = $request->only('id');
            $pickMainCv = $this->uploadService->pickMainCv($request);
            return redirect(route('candidate.your_cv'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }
}
