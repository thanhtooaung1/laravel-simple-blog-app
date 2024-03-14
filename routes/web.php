<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Models\Article;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('/', 'index', ['articles' => Article::all()])->name('home');
Route::get('/articles/{id}/read', [ArticleController::class, 'show'])->name('article.read');

Auth::routes();

Route::resource('/categories', CategoryController::class);
Route::resource('/tags', TagController::class);
Route::resource('/articles', ArticleController::class)->middleware('auth');
