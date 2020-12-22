<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('comments')->group(function () {
        Route::get('', [CommentsController::class, 'index'])->name('comment.index');
        //Route::get('create', [CommentsController::class, 'create'])->name('comment.create');
        //Route::post('store', [CommentsController::class, 'store'])->name('comment.store');
        Route::get('edit/{id}', [CommentsController::class, 'edit'])->name('comment.edit');
        Route::post('store/{id?}', [CommentsController::class, 'update'])->name('comment.update');
        Route::delete('destroy/{id?}', [CommentsController::class, 'destroy'])->name('comment.destroy');
    });
    
    Route::prefix('posts')->group(function () {
        Route::get('', [PostsController::class, 'index'])->name('post.index');
        Route::get('create', [PostsController::class, 'create'])->name('post.create');
        Route::get('edit/{id}', [PostsController::class, 'edit'])->name('post.edit');
        Route::post('store/{id?}', [PostsController::class, 'store'])->name('post.store');
        Route::delete('destroy/{id?}', [PostsController::class, 'destroy'])->name('post.destroy');
    });

    Route::prefix('news')->group(function () {
        Route::get('', [NewsController::class, 'index'])->name('news.index');
        Route::get('create', [NewsController::class, 'create'])->name('news.create');
        Route::get('edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::post('store/{id?}', [NewsController::class, 'store'])->name('news.store');
        Route::delete('destroy/{id?}', [NewsController::class, 'destroy'])->name('news.destroy');
    });    
});

require __DIR__.'/auth.php';

Route::get('', [FrontendController::class, 'home'])->name('home');
Route::get('/posts', [FrontendController::class, 'posts'])->name('posts');
Route::get('/posts/{id}', [FrontendController::class, 'postShow'])->name('post.show');
Route::get('/news', [FrontendController::class, 'news'])->name('news');
Route::get('/news/{id}', [FrontendController::class, 'newsShow'])->name('news.show');

Route::middleware(ProtectAgainstSpam::class)->group(function() {
    Route::post('/posts/{id}/comment', [FrontendController::class, 'postCommentCreate'])->name('post.comment.store');
    Route::post('/posts/{id}/reply', [FrontendController::class, 'postCommentReplyCreate'])->name('post.reply.store');
    Route::post('/news/{id}/comment', [FrontendController::class, 'newsCommentCreate'])->name('news.comment.store');
    Route::post('/news/{id}/reply', [FrontendController::class, 'newsCommentReplyCreate'])->name('news.reply.store');
});