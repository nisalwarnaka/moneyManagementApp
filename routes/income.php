<?php

use App\Http\Controllers\Income\IncomeDetailsController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/income',[IncomeDetailsController::class, 'index'])->name('income.index');
Route::post('/income',[IncomeDetailsController::class, 'addNewIncomeType'])->name('incometype.add');
