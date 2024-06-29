
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IjazahController;
use App\Http\Controllers\KunciController;
use App\Http\Controllers\RSAController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\ValidasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ValidasiController::class, 'index'])->name('index')->middleware('guest');
Route::post('/upload', [ValidasiController::class, 'upload'])->name('upload')->middleware('guest');
Route::get('/upload', [ValidasiController::class, 'show'])->name('show')->middleware('guest');
Route::get('/validasi', [ValidasiController::class, 'validation'])->name('validation')->middleware('guest');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('kunci', KunciController::class);
Route::get('generate-keys', [KunciController::class, 'generateKey'])->name('kunci.generateKey');


Route::resource('ijazah', IjazahController::class);
Route::get('/ijazah/{ijazah}/sign', [IjazahController::class, 'signIn'])->name('ijazah.sign');

Route::resource('sign', SignController::class);
