<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/menu', function () {
    $items = DB::table('items')->get();
    return view('menu', ['items' => $items]);
})->name('menu');

Route::resource('items', ItemController::class);

Route::get('/contact', function () {
    return view('welcome');
})->name('contact');

Route::get('/dashboard', function () {
    // Haal de items op via de DB facade
    $items = \Illuminate\Support\Facades\DB::table('items')->get();
    
    // Stuur ze mee naar de 'dashboard' view
    return view('dashboard.index', compact('items'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
