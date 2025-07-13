<?php

use App\Http\Controllers\Income\IncomeDetailsController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/income',[IncomeDetailsController::class, 'index'])->name('income.index');
Route::post('/income-create',[IncomeDetailsController::class, 'addNewIncomeType'])->name('incomeType.add');
Route::post('/income-update',[IncomeDetailsController::class, 'update'])->name('incomeType.update');
Route::post('/income-delete',[IncomeDetailsController::class, 'delete'])->name('incomeType.delete');
Route::post('/income-add',[IncomeDetailsController::class, 'addNewIncome'])->name('income.add');
