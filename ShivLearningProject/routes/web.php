<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AdminController::class, 'register'])->name('register');
Route::post('user/register', [AdminController::class, 'userRegister'])->name('user.register');

Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('user/login', [AdminController::class, 'userLogin'])->name('user.login');


Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::middleware(['auth', 'auth'])->group(function () {

        Route::get('google/address', [UserController::class, 'googleAddressMaps'])->name('google.address.maps');
        Route::get('user/list', [UserController::class, 'userList'])->name('user.list');
        Route::get('view/add/user', [UserController::class, 'viewAddUser'])->name('view.add.user');
        Route::post('add/user', [UserController::class, 'addUser'])->name('add.user');
        Route::get('view/profile/{id}', [UserController::class, 'viewProfile'])->name('view.profile');
        Route::get('edit/profile/{id}', [UserController::class, 'editProfile'])->name('edit.profile');
        Route::post('save/edit/profile', [UserController::class, 'saveEditProfile'])->name('save.edit.profile');
        Route::get('delete/{id}', [UserController::class, 'deleteUser'])->name('delete.user');

        Route::get('auto-complete-address', [UserController::class, 'googleAutoAddress']);
        Route::any('changeStatus', [UserController::class, 'changeStatus'])->name('change.status');;

        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');

        Route::get('chat', [ChatController::class, 'chat'])->name('chat');
    });
});
