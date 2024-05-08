<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController2;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\BelajarController;


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

// Route::get('/', function () {
//     echo "string";
// });

Route::get('/login', [LoginRegisterController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginRegisterController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginRegisterController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix'=> 'v2', 'middleware'=> ['auth'], 'as'=> 'v2.'], function(){
        Route::get('/', [HomeController2::class, 'dashboard'])->name('dashboard');
        Route::get('/employee', [HomeController2::class, 'employee'])->name('employee');
        Route::get('/employee/create', [HomeController2::class, 'create'])->name('employee.create');
//         Route::post('/employee/store', [HomeController::class, 'store'])->name('employee.store');

        Route::get('/employee/edit/{id}', [HomeController2::class, 'edit'])->name('employee.edit');
//         Route::get('/employee/detail/{id}', [HomeController::class, 'detail'])->name('employee.detail');
//         Route::put('/employee/update/{id}', [HomeController::class, 'update'])->name('employee.update');
//         Route::delete('/employee/delete/{id}', [HomeController::class, 'delete'])->name('employee.delete');

}
);



