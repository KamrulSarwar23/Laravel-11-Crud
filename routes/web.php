<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/posts/trash', [PostController::class, 'trashIndex'])->name('trash.index');
Route::get('/posts/restore/{id}', [PostController::class, 'postRestore'])->name('post.restore');
Route::Delete('/posts/permanent-delete/{id}', [PostController::class, 'postPermanentDelete'])->name('post.permanent-delete');

Route::resource('posts', PostController::class);
