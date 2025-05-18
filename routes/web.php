<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site;
use App\Http\Controllers\AuthCtrl;
use App\Http\Controllers\CaptchaCtrl;
use App\Http\Controllers\HumanResource;
use App\Http\Controllers\Designation;
use App\Http\Controllers\Maintenance;
use App\Http\Controllers\Student;
use App\Http\Controllers\Fees;
use App\Http\Controllers\Permission;

Route::get('/', [Site::class, 'index'])->name('home');
Route::get('/login', [AuthCtrl::class, 'index'])->name('login');
Route::post('/login', [AuthCtrl::class, 'login'])->name('login.post');

Route::get('/refresh-captcha', [CaptchaCtrl::class, 'refresh'])->name('refresh-captcha');

Route::middleware(['auth:web'])->group(function(){

    Route::get('/under_dev', [Maintenance::class, 'under_dev'])->name('under_dev');

    Route::get('/dashboard', [Site::class, 'dashboard'])->name('dashboard');
    Route::get('/hr/department', [HumanResource::class, 'department'])->name('department');
    Route::post('/hr/department/create', [HumanResource::class, 'department_create'])->name('department_create');
    Route::post('/hr/department/edit', [HumanResource::class, 'department_edit'])->name('department_edit');
    Route::get('/hr/department/delete', [HumanResource::class, 'department_delete'])->name('department_delete');


    Route::get('/hr/designation', [HumanResource::class, 'designation'])->name('designation');
    Route::post('/hr/designation/create', [HumanResource::class, 'designation_create'])->name('designation_create');
    Route::post('/hr/designation/edit', [HumanResource::class, 'designation_edit'])->name('designation_edit');
    Route::get('/hr/designation/delete', [HumanResource::class, 'designation_delete'])->name('designation_delete');


    Route::get('/permission', [Permission::class, 'userpermission'])->name('userpermission');
    Route::get('/permission/role_permission', [Permission::class, 'role_permission'])->name('role_permission');
    Route::get('/permission/role_permission_add', [Permission::class, 'role_permission_add'])->name('role_permission_add');
    Route::get('/permission/role_permission_remove', [Permission::class, 'role_permission_remove'])->name('role_permission_remove');


    Route::get('/hr/staff', [HumanResource::class, 'staff'])->name('staff');
    Route::get('/hr/staff/create_view', [HumanResource::class, 'staff_create_view'])->name('staff_create_view');
    Route::get('/hr/staff/edit_view', [HumanResource::class, 'staff_edit_view'])->name('staff_edit_view');
    Route::post('/hr/staff/create', [HumanResource::class, 'staff_create'])->name('staff_create');
    Route::get('/hr/staff/delete', [HumanResource::class, 'staff_delete'])->name('staff_delete');

    Route::get('/student/student', [Student::class, 'student'])->name('student');
    Route::get('/student/student_create_view', [Student::class, 'student_create_view'])->name('student_create_view');
    Route::post('/student/student_create', [Student::class, 'student_create'])->name('student_create');
    Route::get('/student/student_edit_view', [Student::class, 'student_edit_view'])->name('student_edit_view');
    Route::post('/student/student_edit', [Student::class, 'student_edit'])->name('student_edit');
    Route::get('/student/student_delete', [Student::class, 'student_delete'])->name('student_delete');
   


    Route::get('/fee/fee_type', [Fees::class, 'fee_type'])->name('fee_type');
    Route::post('/fee/fee_type_edit', [Fees::class, 'fee_type_edit'])->name('fee_type_edit');
    Route::post('/fee/fee_type_create', [Fees::class, 'fee_type_create'])->name('fee_type_create');
    Route::get('/fee/fee_type_delete', [Fees::class, 'fee_type_delete'])->name('fee_type_delete');

    Route::get('/fee/fee_group', [Fees::class, 'fee_group'])->name('fee_group');
    Route::post('/fee/add_fee', [Fees::class, 'add_fee'])->name('add_fee');
    Route::get('/fee/remove_fee', [Fees::class, 'remove_fee'])->name('remove_fee');
});