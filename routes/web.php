<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscribersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AdminPanelController;
use App\Http\Controllers\AdminPanel\CommentController;
use App\Http\Controllers\AdminPanel\PostController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\LoginController;
use App\Http\Controllers\AdminPanel\MessageController;
use App\Http\Controllers\AdminPanel\ProfileController;

//Home
Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/single/{id}', [SingleController::class , 'index'])->name('index.single');
Route::post('/single/{id}', [SingleController::class , 'addComment'])->name('add.comment');
Route::post('/home', [SubscribersController::class, 'store'])->name('store.Subscriber');
Route::get('/content', [HomeController::class, 'content'])->name('content');
Route::post('/content', [MessageController::class, 'send'])->name('post.content');

//AdminPanel
Route::get('/admin-panel/home' , [AdminPanelController::class , 'index'])->name('index.adminPanel');
Route::get('/admin-panel/category/{id}' , [AdminPanelController::class , 'deleteCategory'])->name('delete.category');
Route::post('/admin-panel/profile/{id}' , [AdminPanelController::class , 'editProfile'])->name('edit.profile');
Route::get('/admin-panel/approve/{id}' , [CommentController::class , 'approve'])->name('approve.comment');
Route::get('/admin-panel/post/{id}' , [AdminPanelController::class , 'deletePost'])->name('delete.post');
Route::get('/admin-panel/comment/{id}' , [AdminPanelController::class , 'deleteComment'])->name('delete.comment');

//Profile
Route::get('/admin-panel/profile/{id}' , [ProfileController::class , 'profile'])->name('profile');
Route::get('/admin-panel/profile/{id}/create' , [ProfileController::class , 'createProfile'])->name('create.profile');
Route::post('/admin-panel/profile/{id}/create' , [ProfileController::class , 'storeProfile'])->name('store.profile');
Route::get('/admin-panel/profile/edit/{id}' , [ProfileController::class , 'editProfile'])->name('edit.profile');
Route::put('/admin-panel/profile/edit/{id}' , [ProfileController::class , 'updateProfile'])->name('update.profile');
Route::get('/admin-panel/profile/{id}/delete' , [ProfileController::class , 'deleteProfile'])->name('delete.profile');


//posts
Route::get('/admin-panel/posts' , [PostController::class , 'index'])->name('index.post');
Route::get('/admin-panel/posts/create' , [PostController::class , 'indexCreate'])->name('create.post');
Route::post('/admin-panel/posts/create' , [PostController::class , 'store'])->name('store.post');
Route::get('/admin-panel/posts/edit/{id}' , [PostController::class , 'edit'])->name('edit.post');
Route::put('/admin-panel/posts/edit/{id}' , [PostController::class , 'update'])->name('update.post');
Route::get('/admin-panel/posts/force-delete/{id}', [PostController::class, 'forceDelete'])->name('forceDelete.post');
Route::get('/admin-panel/posts/remake/{id}', [PostController::class, 'remake'])->name('remake.post');

//categories
Route::get('/admin-panel/categories', [CategoryController::class, 'index'])->name('index.category');
Route::get('/admin-panel/categories/create', [CategoryController::class, 'create'])->name('create.category');
Route::post('/admin-panel/categories/create', [CategoryController::class, 'store'])->name('store.category');
Route::get('/admin-panel/categories/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
Route::put('/admin-panel/categories/edit/{id}', [CategoryController::class, 'update'])->name('update.category');
Route::get('/admin-panel/categories/force-delete/{id}', [CategoryController::class, 'forceDelete'])->name('forceDelete.category');
Route::get('/admin-panel/categories/remake/{id}', [CategoryController::class, 'remake'])->name('remake.category');

//comments
Route::get('/admin-panel/comments', [CommentController::class, 'index'])->name('index.comment');

//Login
Route::get('/admin-panel/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin-panel/login', [LoginController::class, 'login'])->name('post.login');
Route::get('/admin-panel/logout', [LoginController::class, 'logout'])->name('post.logout');

//messages
Route::get('/admin-panel/messages', [MessageController::class, 'index'])->name('index.message');
Route::get('/admin-panel/messages/{id}', [MessageController::class, 'approve'])->name('approve.message');
Route::get('/admin-panel/messages/show/{id}', [MessageController::class, 'show'])->name('show.message');
Route::get('/admin-panel/messages/{id}' , [AdminPanelController::class , 'deleteMessage'])->name('delete.message');
