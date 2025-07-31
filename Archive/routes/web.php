<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('contracts', ContractController::class);
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/settings/signature', function () {
        return view('pages.settings.signature');
    })->name('settings.signature');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/settings/ai', function () {
        return view('pages.settings.ai');
    })->name('settings.ai');
});
