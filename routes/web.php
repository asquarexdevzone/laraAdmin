<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {return view('welcome');});

Route::get('/admin', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AuthController::class, 'register'])->name('admin.register');
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/add-product', [AuthController::class, 'addProduct'])->name('admin.product');