<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CvUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv_id',
        'employer_id',
        'user_id',
    ];

    public function addCandidateApply($data)
    {
        $candidateApply = CvUser::create([
            'cv_id' => $data['cv_id'],
            'employer_id' => $data['employer_id'],
        ]);
    }

    public function cv()
    {
        return $this->belongsTo(Cv::class, 'cv_id');
    }
}
