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

    // User Infos
    Route::get('/userinfos', function () {
        return view('userinfos');
    })->name('userinfos');

    // Forum
    Route::get('/forum', [App\Http\Controllers\ForumController::class, 'index'])->name('forum');
    Route::get('/forum/overview', [App\Http\Controllers\ForumController::class, 'overview'])->name('forum_overview');
    Route::get('/forum/create', [App\Http\Controllers\ForumController::class, 'create'])->name('forum_create');

    Route::get('/forum/delete/{forum_id}', [App\Http\Controllers\ForumController::class, 'delete'])->name('forum_delete');
    Route::get('/forum/edit/{forum_id}', [App\Http\Controllers\ForumController::class, 'edit_forum'])->name('forum_edit');
    Route::get('/forum/edit_post/{forum_id}', [App\Http\Controllers\ForumController::class, 'edit_forum_post'])->name('forum_edit_post');
    Route::get('/forum/new', [App\Http\Controllers\ForumController::class, 'create_form'])->name('forum_new');
    Route::get('/forum/find', [App\Http\Controllers\ForumController::class, 'find'])->name('forum_find');

    // Messages
    Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages');
    Route::get('/messages/{forum_id}/create', [App\Http\Controllers\MessageController::class, 'create'])->name('messages_create');
    Route::get('/messages/{forum_id}/delete/{message_id}', [App\Http\Controllers\MessageController::class, 'delete'])->name('messages_delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
