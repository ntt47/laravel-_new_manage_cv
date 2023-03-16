<?php

namespace App\Services\employer;

use App\Models\User;
use App\Models\Job;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;


class ListCandidateService
{
     protected $cv;

     public function __construct(Cv $cv)
     {
          $this->cv = $cv;
     }

     public function getListCandidate() {
        return $this->cv->getListCandidate();
     }
     
}
