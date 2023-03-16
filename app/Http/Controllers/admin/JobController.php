<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostJobRequest;
use Illuminate\Http\Request;
use App\Services\candidate\JobService;
use App\Models\Job;
use Throwable;

class JobController extends Controller
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
            $job = $this->jobService->getJob();
            // dd($job);
            return view('admin.table_job', compact('job'));
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
        try {
            $employerId = $this->jobService->getJobId();
            return view('admin.create_job', compact('employerId'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostJobRequest $request)
    {
        //
        try {
            $request = $request->only(['employer_id', 'title', 'time', 'location', 'description', 'status']);
            // dd($request);
            $jobs= $this->jobService->createNewJob($request);
            return redirect(route('job.index'));
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
            $job = $this->jobService->getInfoJobId($id);
            return view('admin.update_job', compact('job'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostJobRequest $request, string $id)
    {
        //
        try {
            $request = $request->only('title', 'time', 'location', 'description', 'status');
            $updateJob = $this->jobService->updateJob(['request'=>$request, 'id'=>$id]);
            return redirect(route('job.index'));
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
            $deleteJob = $this->jobService->deleteJob($id);
            return redirect(route('job.index'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }
}
