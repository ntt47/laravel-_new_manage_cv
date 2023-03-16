<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CvUser;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;
use App\Services\employer\ListCandidateService;
use Illuminate\Support\Facades\Storage;
use Throwable;
use App\Services\employer\RechargeService;

class ListCandidateController extends Controller
{
    //
    protected $listCandidateService;
    protected $rechargeSerVice;

    public function __construct(ListCandidateService $listCandidateService, RechargeSerVice $rechargeSerVice)
    {
        $this->listCandidateService = $listCandidateService;
        $this->rechargeSerVice = $rechargeSerVice;
    }

    public function index()
    {
        try {
            $totalMoney = $this->rechargeSerVice->getMoney();
            $cvs = $this->listCandidateService->getListCandidate();
            if ($totalMoney <= 10000) {
                return view('employer.list_candidate', compact('cvs'))->with('not_enough_money', 'You do not enough money, please recharge to see this CV');
            } else {
                return view('employer.list_candidate', compact('cvs', 'totalMoney'));
            }
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    public function showCv(Request $request)
    {
        try {

            $data = $request->only(['fileName']);
            $deduction = $this->rechargeSerVice->deduction();
            foreach ($data as $value) {
            }
            $path = Storage::path('public/' . $value);
            return response()->file($path, [
                'Content-Type' => 'application/pdf'
            ]);
        } catch (Throwable $e) {
            return abort(404);
        }
    }
}
