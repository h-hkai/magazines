<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazinesController;
use App\Http\Controllers\VoicesController;
use App\Http\Controllers\ItCoursesController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MagazinesController::class, 'index']);
Route::get('/count', [MagazinesController::class, 'count'])->name('magazines.count');
Route::get('/show/{id}', [MagazinesController::class, 'show'])->name('magazines.show');

Route::get('/itcourses', [ItCoursesController::class, 'index']);

Route::get('/voices', [VoicesController::class, 'index']);

Route::get('/history', [MagazinesController::class, 'history']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
