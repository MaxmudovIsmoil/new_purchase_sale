<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPlanController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', function () {
    return view('auth.login');
});
Route::post('login', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth', 'isActive'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [OrderController::class, 'index']);

    Route::group(['prefix' => '/'], function() {
        Route::resource('order', OrderController::class)->except(['create', 'edit', 'show']);
        Route::get('/order/one/{id}', [OrderController::class, 'getOne'])->name('order.getOne');
    });

    Route::group(['prefix' => '/'], function() {
        Route::resource('/user-plan', UserPlanController::class)->except(['create', 'edit', 'show']);
        Route::get('/user-plan/one/{id}', [UserPlanController::class, 'getOne'])->name('user-plan.getOne');
        Route::get('/user-plan/get-instances/{id}', [UserPlanController::class, 'getInstances'])->name('user-plan.getInstances');
    });

    Route::post('/user/profile', [UserController::class, 'profile'])->name('user.profile');

    Route::middleware('isAdmin')->group(function () {

        Route::group(['prefix' => '/'], function() {
            Route::resource('user', UserController::class)->except(['create', 'edit', 'show']);
            Route::get('/users', [UserController::class, 'getUsers'])->name('getUsers');
            Route::get('/user/one/{id}', [UserController::class, 'getOne'])->name('user.getOne');
        });

        Route::group(['prefix' => '/'], function() {
            Route::resource('instance', InstanceController::class)->except(['create', 'edit', 'show']);
            Route::get('/instances', [InstanceController::class, 'getInstances'])->name('getInstances');
            Route::get('/instance/one/{id}', [InstanceController::class, 'getOne'])->name('instance.getOne');
        });

    });

});
