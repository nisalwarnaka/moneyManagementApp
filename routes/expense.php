<?php


use App\Http\Controllers\expense\ExpenseDetailsController;
use Illuminate\Support\Facades\Route;


Route::get('/expense',[ExpenseDetailsController::class, 'index'])->name('expense.index');
Route::post('/expense',[ExpenseDetailsController::class, 'expenseTypeCreate'])->name('expenseType.create');
