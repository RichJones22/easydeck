<?php

use Illuminate\Support\Facades\Route;
use App\Models\Person;
use Illuminate\Http\Request;

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

Route::get('/person', function (Request $request) {

    $hairColor = $request->input("color");

    $person = new Person;

    $person->setAttribute("hair_color",$hairColor);

    if ($person->save()) {
        echo "you saved a person with a hair colored ". $hairColor;
    };
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/decks', function () {
    return view('decks');
})->name('decks');
