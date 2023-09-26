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
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.created');

Route::get('/terms', function () {
    return view('terms');
});
