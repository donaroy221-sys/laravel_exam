<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalaryReportController;
use App\Http\Middleware\ValidUser;
use App\Http\Middleware\ValidAdmin;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(ValidAdmin::class)->group(function(){
Route::get('/register',[AuthController::class,'register'])->name('register') ;

Route::post('/register',[AuthController::class,'registerPost'])->name('register.post');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/login',[AuthController::class,'login'])->name('login');

Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');
});


Route::resource('employee',EmployeeController::class)->middleware('auth');

Route::get('/salary',[SalaryReportController::class,'generateReport'])->name('salary.generate');