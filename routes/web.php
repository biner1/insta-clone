<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PostsController;

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

Auth::routes();


Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('profile.update');


Route::get('/', [PostsController::class, 'index']);
Route::get('/p/create', [PostsController::class, 'create'])->name('posts.create');
Route::get('/p/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::post('/p', [PostsController::class, 'store'])->name('posts.store');

Route::post('/follow/{user}',[FollowsController::class, 'store']);

