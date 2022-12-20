<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TicketsController;

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

Route::get('/About', function () {
    return view('About');
});
Route::get('/Signup', function () {
    return view('auth/Signup');
});
Route::get('/Signin', function () {
    return view('auth/Signin');
});

Route::get('/Admin/Dashboard', [TicketsController::class,'indexContact']);

Route::get('/Admin/Vehicles', [VehicleController::class,'index']);
Route::post('/Admin/AddNewVeh', [VehicleController::class, "AddVehicle"]);
Route::post('/Admin/deleteVeh', [VehicleController::class, "DeleteVehicle"]);
Route::get('Admin/Vehicle/{id}', [VehicleController::class, "getVehicleById"]);

Route::get('/Admin/Category', [CategoryController::class,'index']);
Route::post('/Admin/AddNewCat', [CategoryController::class, "AddCategory"]);
Route::post('/Admin/deleteCat', [CategoryController::class, "DeleteCategory"]);

Route::get('/Admin/Tickets', [TicketsController::class,'index']);
Route::post('/Admin/AddNewTicket', [TicketsController::class, "AddTicket"]);


Route::get('/CheckTickets', [TicketsController::class,'indexUser']);
Route::post('/CheckTickets', [TicketsController::class,'CheckForTickets']);
Route::post('/SubmitForm', [TicketsController::class,'SubmitForm']);
Route::get('Logout',[UserController::class,'Logout']);
Route::post('/Login', [UserController::class, "login"]);
