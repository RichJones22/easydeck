<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PersonController;
use App\Http\Controllers\PostController;
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

//Route::get('/person', function (Request $request) {
//    (new PersonController)->store($request);
//});

Route::get('/person', [PersonController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/riches-card', function () {
    return view('riches-card');
})->name('riches-card');

Route::get('/PostIndex', [PostController::class, 'index']);
