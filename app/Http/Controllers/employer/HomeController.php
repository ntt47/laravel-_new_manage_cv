<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\employer\JobService;
use Exception;
use PHPUnit\Event\Code\Throwable;

class HomeController extends Controller
{
    //
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }
    public function index() {
        try {
            $jobs = $this->jobService->getJobEmployer();
            return view('employer.index', compact('jobs'));
        }
        catch(Throwable  $e){
            return abort(404);
        }
    }
}
