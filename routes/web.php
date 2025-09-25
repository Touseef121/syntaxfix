<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['activity'])->group(function () {
    Route::get('/', function () {
        return view('forum.index');
    })->name('home');

    Route::middleware('auth')->group(function () {
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/profile/{id}', function ($id) {
                return view('forum.user.user-profile', compact('id'));
            })->name('profile');
        });

        Route::prefix('forum')->name('forum.')->group(function () {
            Route::get('/create', function () {
                return view('forum.create');
            })->name('create');
        });
    });
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
