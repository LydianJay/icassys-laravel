<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site;
use App\Http\Controllers\AuthCtrl;
use App\Http\Controllers\CaptchaCtrl;
use App\Http\Controllers\HumanResource;
use App\Http\Controllers\Designation;

Route::get('/', [Site::class, 'index'])->name('home');
Route::get('/login', [AuthCtrl::class, 'index'])->name('login');
Route::post('/login', [AuthCtrl::class, 'login'])->name('login.post');

Route::get('/refresh-captcha', [CaptchaCtrl::class, 'refresh'])->name('refresh-captcha');

Route::middleware(['auth:web'])->group(function(){
    Route::get('/dashboard', [Site::class, 'dashboard'])->name('dashboard');
    Route::get('/hr/department', [HumanResource::class, 'department'])->name('department');
    Route::get('/hr/designation', [HumanResource::class, 'designation'])->name('designation');
    Route::post('/hr/designation/create', [HumanResource::class, 'designation_create'])->name('designation_create');
    Route::post('/hr/designation/edit', [HumanResource::class, 'designation_edit'])->name('designation_edit');
    Route::get('/hr/designation/delete', [HumanResource::class, 'designation_delete'])->name('designation_delete');
});