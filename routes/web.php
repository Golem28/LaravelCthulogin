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

Route::get('/', function ()
{
    return view('content');
});


Route::middleware('auth')->group(function () {
    Route::get('/content', function () {
        return view('content');
    })->name('content');

    // Navigator
    Route::get('/navigator', function () {
        return view('navigator');
    })->name('navigator');

    // Forum
    Route::get('/forum', [App\Http\Controllers\ForumController::class, 'index'])->name('forum');
    Route::get('/forum/create', [App\Http\Controllers\ForumController::class, 'create'])->name('forum_create');
    Route::get('/forum/delete/{forum_id}', [App\Http\Controllers\ForumController::class, 'delete'])->name('forum_delete');
    Route::get('/forum/new', [App\Http\Controllers\ForumController::class, 'create_form'])->name('forum_new');

    // Messages
    Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages');
    Route::get('/messages/{forum_id}/create', [App\Http\Controllers\MessageController::class, 'create'])->name('messages_create');
    Route::get('/messages/{forum_id}/delete/{message_id}', [App\Http\Controllers\MessageController::class, 'delete'])->name('messages_delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
