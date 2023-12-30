<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleRentController;
use App\Http\Controllers\VehicleTransactionReturnController;
use App\Http\Middleware\Auth;
use App\Models\VehicleTransactionReturnData;
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

Route::get('/add-user', [UserController::class, 'addUser'])->name('add-user');

Route::prefix('/')->group(function () {
    Route::get('/login', [Controller::class, 'loginPage'])->name('login-page');
    Route::post('/login', [Controller::class, 'doLogin'])->name('do-login');
    Route::get('/logout', [Controller::class, 'doLogout'])->name('do-logout');
});

Route::group(['prefix' => 'auth', 'middleware' => 'auth.app'], function () {
    Route::get('/user-management', [UserController::class, 'show'])->name('user-management');
    Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
    Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete-user');
    Route::post('/create-user', [UserController::class, 'createUser'])->name('add-user');
    Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('update-user');

    Route::get('/vehicle-management', [VehicleController::class, 'show'])->name('vehicle-management');
    Route::get('/add-vehicle', [VehicleController::class, 'addVehicle'])->name('add-vehicle');
    Route::get('/edit-vehicle/{id}', [VehicleController::class, 'editVehicle'])->name('edit-vehicle');
    Route::get('/delete-vehicle/{id}', [VehicleController::class, 'deleteVehicle'])->name('delete-vehicle');
    Route::post('/create-vehicle', [VehicleController::class, 'createVehicle'])->name('create-vehicle');
    Route::post('/update-vehicle/{id}', [VehicleController::class, 'updateVehicle'])->name('update-vehicle');

    Route::get('/rent-car-transaction-list', [VehicleRentController::class, 'show'])->name('rent-car-transaction');
    Route::get('/approve-rent/{id}', [VehicleRentController::class, 'approveRent'])->name('approve-rent');
    
    Route::get('/add-rent-transaction', [
        VehicleRentController::class, 'addRentTransaction'
    ])->name('add-rent-transaction');

    Route::post('/create-rent-transaction', [
        VehicleRentController::class,
        'createRentTransaction'
    ])->name('create-rent-transaction');

    Route::get('/return-car-transaction-list', [VehicleTransactionReturnController::class, 'show'])->name('return-car-transaction');
    Route::get('/approve-return/{id}', [VehicleTransactionReturnController::class, 'approveReturn'])->name('approve-return');
    Route::get('/do-approve-return/{id}', [VehicleTransactionReturnController::class, 'doApproveReturn'])->name('do-approve-return');
});