<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account;
use App\Http\Controllers\Logout;
use App\Http\Controllers\AddAccount;
use App\Http\Controllers\Home;
use App\Http\Controllers\EmailVerify;
use App\Http\Controllers\ChangeEmail;
use App\Http\Controllers\ForgotPassword;








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


Route::get('/', [Home::class, 'index'])->middleware('auth');
Route::get('/email-verify', [EmailVerify::class, 'create']);
Route::post('/email-verify', [EmailVerify::class, 'store']);

Route::get('/login', [Account::class, 'create']);
Route::post('/login', [Account::class, 'store'])->name('login');

Route::get('/forgot-password', [ForgotPassword::class, 'create']);
Route::post('/forgot-password', [ForgotPassword::class, 'store']);
Route::post('/forgot-password-otp', [ForgotPassword::class, 'genOTP']);
Route::post('/enter-password', [ForgotPassword::class, 'enterPass']);




Route::get('/change-email', [ChangeEmail::class, 'create']);
Route::post('/change-email', [ChangeEmail::class, 'store'])->name('changeEmail');
Route::post('/generate-change-email-otp', [ChangeEmail::class, 'genOTP']);




Route::get('/register', [AddAccount::class, 'create'])->name('register');
Route::post('/register', [AddAccount::class, 'store']);

Route::get('/logout', [Logout::class, 'index'])->name('logOut');


