<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/'], function () {
    Route::get('/', [JobController::class, 'index'])->name('job.index');
    Route::get('/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/store', [JobController::class, 'store'])->name('job.store');
});
