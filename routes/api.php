<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContractApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->prefix('contracts')->group(function () {
    Route::get('/', [ContractApiController::class, 'index']);
    Route::post('/{id}/approve', [ContractApiController::class, 'approve']);
});
