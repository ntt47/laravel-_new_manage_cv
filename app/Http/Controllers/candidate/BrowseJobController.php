<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Services\candidate\JobService;
use App\Http\Requests\CandidateApplyRequest;
use App\Services\candidate\CvUserService;
use Throwable;

class BrowseJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $jobService;
    protected $cvUserService;

    public function __construct(JobService $jobService, CvUserService $cvUserService)
    {
        $this->jobService = $jobService;
        $this->cvUserService = $cvUserService;
    }

    public function index()
    {
        try {
            $jobs = $this->jobService->getSearchJob();
            $idMainCv = $jobs['idMainCv'];
            $jobs = $jobs['jobs'];
            if ($jobs->count() == 0) {
                return view('candidate.browsejobs');
            } else {
                return view('candidate.browsejobs', compact('jobs', 'idMainCv'));
            }
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    public function store(CandidateApplyRequest $request)
    {
        try {
            $request = $request->only(['cv_id', 'employer_id']);
            $candidateApply = $this->cvUserService->addCandidateApply($request);
            return redirect(route('browseJob.index'))->with('applySuccess', 'Bạn đã ứng tuyển thành công, chúc mừng bạn !!!');
        } catch (Throwable $e) {
            return abort(404);
        }
    }
}
