<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'phone_number',
        'role',
        'degree',
        'experience',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public static function getInfoUser()
    {
        $user = User::all()->where('id', Auth::id());
        return $user;
    }

    public static function updateInfo($data)
    {
        User::where('id', $data['id'])->update([
            'user_name' => $data['user_name'],
            'phone_number' => $data['phone_number'],
            'degree' => $data['degree'],
            'experience' => $data['experience'],
        ]);
    }

    public static function updateInfoUser($data) {
        return User::find($data['id'])->update([
            'user_name' => $data['request']['user_name'],
            'phone_number' => $data['request']['phone_number'],
            'degree' => $data['request']['degree'],
            'experience' => $data['request']['experience'],
        ]);
    }


    ///admin create
    public static function createNewUser($data) {
        return User::create([
            'user_name' => $data['user_name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
            'phone_number' => $data['phone_number'],
            'role'=>$data['role'],
            'degree' => $data['degree'],
            'experience' => $data['experience'],
        ]);
    }

    ///admin xóa
    public function deleteUser($data)
    {   
        return User::find($data)->delete();
    }

    ///admin láy ra tất cả
    public static function getAllUser() {
        return User::all();
    }

    //admin lấy ra thông tin
    public static function getUserUpdate($data) {
        return User::find($data);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'employer_id');
    }
}
