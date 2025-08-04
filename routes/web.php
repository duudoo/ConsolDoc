<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PublicContractController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('contracts', ContractController::class);
    Route::get('/public/contracts/{token}', [PublicContractController::class, 'view'])
        ->name('public.contract.view');
});
