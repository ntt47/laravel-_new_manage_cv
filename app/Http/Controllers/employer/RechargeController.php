<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\RechargeRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\employer\RechargeService;
use Throwable;


class RechargeController extends Controller
{
    //

    protected $rechargeSerVice;

    public function __construct(RechargeService $rechargeSerVice)
    {
        $this->rechargeSerVice = $rechargeSerVice;
    }

    public function index()
    {
        try {
            $totalMoney = $this->rechargeSerVice->getMoney();
            if ($totalMoney < 0) {
                $totalMoney = 0;
            }
            return view('employer.recharge', compact('totalMoney'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }

    public function updateMoney(RechargeRequest $request)
    {
        try {
            $request = $request->only(['money']);
            $money = $this->rechargeSerVice->updateMoney($request);
            return redirect(route('employer.updateRechare'));
        } catch (Throwable $e) {
            return abort(404);
        }
    }
}
