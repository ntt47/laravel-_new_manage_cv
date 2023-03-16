<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'upload',
        'status',
    ];

    public static function uploadCv($data)
    {
        $filePath = null;
        $filePath = $data['upload']->storeAs(
            'uploads',
            $data['upload']->getClientOriginalName(),
            'public',
        );
        $cv = Cv::create(['user_id' => $data['user_id'], 'title' => $data['title'], 'upload' => $filePath, 'status' => 1]);
        return $cv;
    }

    public static function getCv()
    {
        $cv = Cv::orderBy('title')->where('user_id', Auth::id())->paginate(3);
        return $cv;
    }

    public static function pickMainCv($data)
    {
        $statusCvs =  Cv::where('status', 1)->update(['status' => 0]);
        $statusCv =  Cv::where('id', $data['id'])->update(['status' => 1]);
    }

    public static function getMainCv()
    {
        $idMainCv = CV::where('status', 1)->pluck('id');
        return $idMainCv;
    }

    public function getListCandidate()
    {
        $cvs = Cv::whereHas('cv_users', function ($query) {
            $query->where('employer_id', Auth::id());
        })->select('title', 'upload', 'created_at')->paginate(3);

        return $cvs;
    }

    public function cv_users()
    {
        return $this->hasMany(CvUser::class, 'cv_id');
    }
}
