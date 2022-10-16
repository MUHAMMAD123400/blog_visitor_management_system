<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubUserController;
use App\Http\Controllers\DepartmantController;
use App\Http\Controllers\VisitorController;

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

Route::controller(CustomAuthController::class)->group(function () {
    Route::get('/' ,  'login')->name('login');

    Route::get('logout' ,  'logout')->name('logout');

    Route::get('index', 'index')->name('dashboard');

    Route::get('regitertation' ,  'regitertation')->name('regitertation');
    
    Route::post('/custom_regitertation' ,  'custom_regitertation')->name('regitertation.custom');

    Route::post('/custom_login' ,  'custom_login')->name('login.custom');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('profile' , 'profile')->name('profile');

    Route::post('profile/edit_validation' , 'edit_validation')->name('profile/edit_validation');
});

Route::controller(SubUserController::class)->group(function () {
    Route::get('sub_user', 'sub_user')->name('user.table');

    Route::get('sub_user/fetchall' , 'fetchall')->name('sub_user.fetchall');

    Route::get('sub_user/add' , 'add' )->name('sub_user.add');

    Route::post('sub_user/add_validation' , 'add_validation' )->name('sub_user.add_validation');

    Route::get('sub_user/edit/{id}' , 'edit' )->name('edit');

    Route::post('sub_user/edit_validation' , 'edit_validation' )->name('sub_user.edit_validation');

    Route::get('sub_user/delete/{id}' , 'delete' )->name('delete');
    
});

Route::controller(DepartmantController::class)->group(function () {
    Route::get('department', 'index')->name('department');
    Route::get('department/fetch_all', 'fetch_all')->name('department.fetch_all');

    Route::get('department/add', 'add')->name('add');
    Route::post('department/add_validation', 'add_validation')->name('department.add_validation');

    Route::get('department/edit/{id}', 'edit')->name('edit');
    Route::post('department/edit_validation', 'edit_validation')->name('department.edit_validation');

    Route::get('department/delete/{id}', 'delete')->name('delete');
}); 

Route::controller(VisitorController::class)->group(function () {
    Route::get('visitor', 'index')->name('visitor');
    Route::get('visitor/fetahall', 'fetah_all')->name('visitor.fetchall');
});