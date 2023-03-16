<?php

namespace App\Services\employer;

use App\Models\User;
use App\Models\Job;
use App\Models\Cv;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;


class RechargeService
{
   protected $transaction;

   public function __construct(Transaction $transaction)
   {
      $this->transaction = $transaction;
   }

   public function updateMoney($data)
   {
      return $this->transaction->updateMoney($data);
   }

   public function getMoney()
   {
      return $this->transaction->getMoney();
   }

   public function deduction()
   {
      return $this->transaction->deduction();
   }
}
