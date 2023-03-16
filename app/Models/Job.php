<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'title',
        'time',
        'company',
        'location',
        'description',
        'status',
    ];

    public static function getJob()
    {
        $job = Job::orderBy('id')->paginate(3);
        return $job;
    }

    public static function getSearchJob()
    {
        $title = request()->title;
        $time = request()->time;
        $location = request()->location;
        $jobs = Job::where('title', 'LIKE', '%' . $title . '%')
            ->Where('time', 'LIKE', '%' . $time . '%')
            ->Where('location', 'LIKE', '%' . $location . '%')
            ->paginate(3);
        return $jobs;
    }

    public static function getJobEmployer()
    {
        $jobs = User::find(Auth::id())->jobs()->orderBy('title')->paginate(2);
        return $jobs;
    }

    public static function createJob($data)
    {
        $user = User::find(Auth::id());
        $jobs = $user->jobs()->create([
            'title' => $data['title'],
            'time' => $data['time'],
            'location' => $data['location'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        return $jobs;
    }

    ///admin lấy ra id
    public static function getJobId()
    {
        return  Job::all()->pluck('employer_id')->unique();
    }

    ////admin thêm mới
    public static function createNewJob($data)
    {
        $jobs = Job::create([
            'employer_id' => $data['employer_id'],
            'title' => $data['title'],
            'time' => $data['time'],
            'location' => $data['location'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        return $jobs;
    }

    ////admin update
    public static function getInfoJobId($data)
    {
        return Job::find($data);
    }

    ///admin update job
    public static function updateJob($data)
    {
        $updateJob = Job::find($data['id'])->update([
            'title' => $data['request']['title'],
            'time' => $data['request']['time'],
            'location' => $data['request']['location'],
            'description' => $data['request']['description'],
            'status' => $data['request']['status'],
        ]);
        return $updateJob;
    }

    ///admin delete job
    public function deleteJob($data) {
        return Job::find($data)->delete();
    }
}
