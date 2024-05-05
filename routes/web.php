<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [PostController::class, 'index']);

/*
// 投稿の一覧ページ
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

 // 投稿の作成ページ
 Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
 
 // 投稿の作成機能
 Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

 // 投稿の詳細ページ
 Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

 // 投稿の更新ページ
 Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
 
 // 投稿の更新機能
 Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

 // 投稿の削除機能
 Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
*/

Route::resource('posts', PostController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


