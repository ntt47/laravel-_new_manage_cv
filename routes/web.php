<?php

use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\candidate\CandidateController;
use App\Http\Controllers\candidate\BrowseJobController;
use App\Http\Controllers\candidate\ProfileController;
use App\Http\Controllers\candidate\UploadController;
use App\Http\Controllers\candidate\YourCvController;
use App\Http\Controllers\employer\HomeController;
use App\Http\Controllers\employer\ListCandidateController;
use App\Http\Controllers\employer\PostJobController;
use App\Http\Controllers\employer\ProfileEmployerController;
use App\Http\Controllers\employer\RechargeController;
use AuthController as GlobalAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showFormLogin'])->name('show_form.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showFormRegister'])->name('show_form.register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('checkLogin')->group(function () {
    Route::prefix('candidate')->middleware('candidate')->group(function () {
        Route::resource('candidate', CandidateController::class);
        Route::resource('browseJob', BrowseJobController::class);
        Route::resource('profile', ProfileController::class);
        Route::get('upload_cv', [UploadController::class, 'index'])->name('show_form.upload');
        Route::post('upload_cv', [UploadController::class, 'uploadCV'])->name('uploadCV');
        Route::get('/your_cv', [YourCvController::class, 'index'])->name('candidate.your_cv');
        Route::get('/viewFile', [YourCvController::class, 'viewFile'])->name('viewFile');
        Route::post('/pickMainCv', [YourCvController::class, 'pickMainCv'])->name('pickMainCv');
    });

    Route::prefix('employer')->middleware('employer')->group(function () {
        Route::get('/index', [HomeController::class, 'index'])->name('employer.index');
        Route::get('/employer', [RechargeController::class, 'index'])->name('employer.recharge');
        Route::post('/employer', [RechargeController::class, 'updateMoney'])->name('employer.updateRechare');
        Route::resource('profileEmployer', ProfileEmployerController::class);
        Route::get('/postJob', [PostJobController::class, 'index'])->name('employer.post_job');
        Route::post('/postJob', [PostJobController::class, 'create'])->name('employer.create');
        Route::get('/list_candidate', [ListCandidateController::class, 'index'])->name('employer.list_candidate');
        Route::post('/list_candidate', [ListCandidateController::class, 'showCv'])->name('showCv.list_candidate');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/index', function () {
        return view('admin.index');
    })->name('index');
    Route::resource('job', JobController::class);
    Route::resource('user', UserController::class);
});
