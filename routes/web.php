<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PersonController;
use App\Http\Controllers\TaskController;
use App\Http\Livewire\PostIndex;
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
    (new PersonController)->create();
});

Route::get('/person', [PersonController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/riches-card', function () {
    return view('riches-card');
})->name('riches-card');

Route::get('/masterCardOne', function () {
    return view('masterCardOne');
})->name('masterCardOne');


// using a JetStream/LiveWire component instead of a controller...
Route::get('/PostIndex', [PostIndex::class, 'index'])
    ->name('post.index');


Route::middleware(['auth:sanctum', 'verified'])->get('/bruces-card', function () {
    return view('bruces-card');
})->name('bruces-card');

Route::get('/tasks', [TaskController::class, 'rich']);

//Route::get('/tasks', [RichController::class, 'index']);
//Route::get('/tasks', 'TaskController@taskController');
//Route::get('demo', 'DemoController@index');

Route::get('post', 'PostController@create')->name('post.create');
Route::post('post', 'PostController@store')->name('post.store');
//Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/article/{post:slug}', 'PostController@show')->name('post.show');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');


Route::middleware(['auth:sanctum', 'verified'])->get('/lessons', function () {
    return view('lessons');
})->name('lessons');


