<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentBoxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Submit idea_form to database
// Route::post('/idea', [IdeaController::class, 'store']);
Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');

// Showing single idea
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');

// Editing single idea
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');

// Updating single idea
Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');

// delete a post
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

// Strore comments
Route::post('/ideas/{idea}/comments', [CommentBoxController::class, 'store'])->name('ideas.comments.store');

// register user
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

// login user
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// loguut
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/terms', function () {
    return view('terms');
});
