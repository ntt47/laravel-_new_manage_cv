<?php

namespace App\Services\employer;

use App\Models\User;
use App\Models\Job;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;


class JobService
{
     protected $job;

     public function __construct(Job $job)
     {
          $this->job = $job;
     }

     public function getJobEmployer()
     {
          $jobs = $this->job->getJobEmployer();
          return $jobs;
     }

     public function createJob($data)
     {
          return $this->job->createJob($data);
     }
}
