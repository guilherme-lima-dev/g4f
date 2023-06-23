<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Controller;
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
    return view('home');
});

Route::get('/task1', [Controller::class, 'task1'])->name('task1');
Route::get('/task2', [Controller::class, 'task2'])->name('task2');
Route::get('/task3', [Controller::class, 'task3'])->name('task3');
