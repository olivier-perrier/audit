<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoringController;
use App\Http\Controllers\ScoringQuestionController;
use App\Http\Controllers\ScoringSectionController;
use App\Models\ScoringSection;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home', [
        'sections' => ScoringSection::all(),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return view('dashboard', [
        'scorings' => Auth::user()->scorings,
    ]);
})->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('scorings/{scoring}/iframe', [ScoringController::class, 'iframe'])->name('scorings.iframe');
    Route::get('scorings/{scoring}/certification', [ScoringController::class, 'certification'])->name('scorings.certification');
    Route::resource('scorings', ScoringController::class);
    Route::resource('scorings.scoring-sections', ScoringSectionController::class);
    Route::resource('scorings.scoring-sections.scoring-questions', ScoringQuestionController::class);

});

require __DIR__.'/auth.php';
