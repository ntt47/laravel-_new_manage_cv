<?php

namespace App\Services\admin;

use App\Models\User;
use App\Models\Job;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;


class UserService
{
     protected $user;

     public function __construct(User $user)
     {
          $this->user = $user;
     }

     public function getAllUser()
     {
          $user = $this->user->getAllUser();
          return $user;
     }

     public function getUserUpdate($data) {
          $user = $this->user-> getUserUpdate($data);
          return $user;
     }

     public function updateInfoUser($data) {
          $user = $this->user->updateInfoUser($data);
          return $user;
     }

     public function createNewUser($data) {
          $user = $this->user->createNewUser($data);
          return $user;
     }

     public function deleteUser($data) {
          $deleteUser = $this->user->deleteUser($data);
          return $deleteUser;
     }
     
}
