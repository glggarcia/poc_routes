<?php

use App\Http\Controllers\EmployeeAddressController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

//Nested resources
Route::resource('funcionario', EmployeeController::class)
    ->parameters([
        'funcionario' => 'employee'
    ])
    ->middleware(['checkToken:general-token']);
Route::get('userland', fn() => 'access granted')
    ->middleware(['checkToken:simple-token']);
Route::resource('funcionario.endereco', EmployeeAddressController::class)
    ->parameters([
        'funcionario' => 'employee',
        'endereco' => 'address'
    ]);
