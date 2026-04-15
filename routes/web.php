<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ContactController;
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
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', [ContactController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard', function () {
    // Haal de items op via de DB facade
    $items = \Illuminate\Support\Facades\DB::table('items')->get();
    $messages = \App\Models\ContactMessage::latest()->get();
    
    // Stuur ze mee naar de 'dashboard' view
    return view('dashboard.index', compact('items', 'messages'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
