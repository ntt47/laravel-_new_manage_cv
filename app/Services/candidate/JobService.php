<?php

namespace App\Services\candidate;

use App\Models\User;
use App\Models\Job;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobService
{
     protected $job;
     protected $cv;

     public function __construct(Job $job, Cv $cv)
     {
          $this->job = $job;
          $this->cv = $cv;
     }

     public function getJob()
     {
          $jobs = $this->job->getJob();
          return $jobs;
     }

     public function getInfoJobId($data)
     {
          $jobs = $this->job->getInfoJobId($data);
          return $jobs;
     }

     public function getSearchJob()
     {
          $jobs = $this->job->getSearchJob();
          $idMainCv = $this->cv->getMainCv();
          return ['jobs'=>$jobs, 'idMainCv'=>$idMainCv];
     }

     public function getJobId() {
          return $this->job->getJobId();
     }

     public function createNewJob($data) {
          return $this->job->createNewJob($data);
     }

     public function updateJob($data) {
          $updateJob = $this->job->updateJob($data);
          return $updateJob;
     }

     public function deleteJob($data) {
          return $this->job->deleteJob($data);
     }

}
