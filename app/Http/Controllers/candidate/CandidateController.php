<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Services\candidate\JobService;
use Throwable;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index()
    {
        //
        try {
            $jobs = $this->jobService->getJob();
            return view('candidate.index', compact('jobs'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

}
