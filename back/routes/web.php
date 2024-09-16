<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XeroController;

Route::get('/BalanceSheet', [XeroController::class, 'BalanceSheet']);
