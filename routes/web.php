<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazinesController;
use App\Http\Controllers\VoicesController;
use App\Http\Controllers\ItCoursesController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MagazinesController::class, 'index']);

Route::get('/', [MagazinesController::class, 'get'])->name('magazines.get');

Route::get('/itcourses', [ItCoursesController::class, 'index']);

Route::get('/itcourses', [ItCoursesController::class, 'get'])->name('itcourses.get');

Route::get('/voices', [VoicesController::class, 'index']);

Route::get('/history', [MagazinesController::class, 'history']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
