<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'money',
        'status',
    ];

    public static function updateMoney($data)
    {
        $user = User::find(Auth::id());
        $money = $user->transactions()->create([
            'employer_id' => Auth::id(),
            'money' => $data['money'],
            'status'=> 0,
        ]);
        return $money;
    }

    public function getMoney()
    {
        $totalMoney= User::find(Auth::id())->transactions()->where('status', 0)->sum('money');
        $totalMoneys= User::find(Auth::id())->transactions()->where('status', 1)->sum('money');
        $totalFinal = $totalMoney - $totalMoneys;
        return $totalFinal;
    }

    public function deduction()
    {
        $user = User::find(Auth::id());
        $money = $user->transactions()->create([
            'employer_id' => Auth::id(),
            'money' => 10000,
            'status'=> 1,
        ]);
        return $money;
    }
}
