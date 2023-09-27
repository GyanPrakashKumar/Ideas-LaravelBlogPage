<?php

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
Route::get('/ideas/{id}', [IdeaController::class, 'show'])->name('ideas.show');

// Editing single idea
Route::get('/ideas/{id}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');

// Updating single idea
Route::put('/ideas/{id}', [IdeaController::class, 'update'])->name('ideas.update');

// delete a post
Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

Route::get('/terms', function () {
    return view('terms');
});
