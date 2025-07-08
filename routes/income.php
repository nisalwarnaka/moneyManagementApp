<?php

use App\Http\Controllers\Income\IncomedetailsController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/income',[IncomedetailsController::class, 'index'])->name('income.index');
