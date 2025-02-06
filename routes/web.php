<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/blogs', [HomeController::class, 'showBlogs'])->name('blogs');
Route::post('/blogs', [HomeController::class, 'postBlog']);

Route::get('/recipes', [HomeController::class, 'recipes'])->name('recipes');

<<<<<<< HEAD
Route::get('/single-blog/{id}', [HomeController::class, 'singleBlog'])->name('single_blog');
=======
>>>>>>> 510012c78cfbc6ecfbd74ce1e9612ecf70b14dca

Route::get('/single-recipe/{id}', [HomeController::class, 'singleRecipe'])->name('single_recipe');
Route::get('/search-recipes', [HomeController::class, 'search'])->name('search-recipes');

Route::get('/about', [HomeController::class, 'about'])->name('about');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'register']);


Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('auth')->name('dashboard'); //middleware for authentication
Route::get('/admin-dashboard', [HomeController::class, 'adminDashboard'])->name('admin-dashboard');

Route::get('/blogs/delete/{id}', [HomeController::class, 'delete'] )->name('blogs.delete');

Route::get('/blogs/edit/{id}', [HomeController::class, 'edit'] )->name('blogs.edit');
Route::get('/blogs/edit-admin/{id}', [HomeController::class, 'editAdmin'] )->name('blogs.editAdmin');

Route::post('/blogs/update/{id}', [HomeController::class, 'update'] )->name('blogs.update');
Route::post('/blogs/update-admin/{id}', [HomeController::class, 'updateAdmin'] )->name('blogs.updateAdmin');