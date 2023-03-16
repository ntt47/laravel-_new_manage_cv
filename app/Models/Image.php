<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'img',
    ];

    public static function createImg($data)
    {
        $filePath = null;
        $filePath = $data['file']->storeAs(
            'uploads',
            $data['file']->getClientOriginalName(),
            'public',
        );
        $userImg = Image::where('user_id', Auth::id())->updateOrCreate(
            ['user_id' => Auth::id()],
            ['img' => $filePath]
        );
        return $userImg;
    }

    public function getImg() {
       return Image::where('user_id', Auth::id())->pluck('img');
    }
}
