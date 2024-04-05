<?php

use App\Events\TestEvent;
use App\Http\Controllers\Usercontroller;
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



Route::get('chat', [Usercontroller::class, 'create'])->name('user.create');
Route::post('chat', [Usercontroller::class, 'store']);
