<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XeroController;

Route::middleware(['Cors'])->group(function () {
    Route::get('/BalanceSheet', [XeroController::class, 'BalanceSheet']);
});
