<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Models\Relationship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Route::get('change-language/{language}', [HomeController::class, 'changeLanguage'])->name('change-language');
Route::resource('articles', ArticleController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('videos', VideoController::class)->middleware('auth');
Auth::routes();
Route::resource('users', UserController::class)->middleware('auth');
Route::get('users/{id}/followers', [UserController::class, 'followers'])->name('users.followers')->middleware('auth');
Route::get('users/{id}/following', [UserController::class, 'following'])->name('users.following')->middleware('auth');

Route::resource('comments', CommentController::class)->except('create', 'index', 'edit')->middleware('auth');
Route::get('comments/{id}/create', [CommentController::class, 'create'])->name('comments.create')->middleware('auth');
Route::get('comments/{id}/index', [CommentController::class, 'index'])->name('comments.index')->middleware('auth');
Route::get('comments/{comment}/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit')->middleware('auth');
Route::resource('relationships', RelationshipController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/showimage/{id}', function($id){
    $user= User::find($id);
    return view('showimage', compact('user'));
})->name('showimage')->middleware('auth');
