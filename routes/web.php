<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bruce', function () {
    return view('bruce');
});

Route::get('/default', function () {
    return view('default');
});

Route::get('/intro', function() {
    return View('intro');
});

Route::get('/card', function() {
    return View('card');
});

Route::get('/about', function()
{
    return View('about');
});
Route::get('/content', function()
{
    return View('content');
});
Route::get('/contact', function()
{
    return View('contact');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
