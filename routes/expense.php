<?php


use App\Http\Controllers\expense\ExpenseDetailsController;
use Illuminate\Support\Facades\Route;


Route::get('/expense',[ExpenseDetailsController::class, 'index'])->name('expense.index');
Route::post('/expense-create',[ExpenseDetailsController::class, 'expenseTypeCreate'])->name('expenseType.create');
Route::post('/expense-update',[ExpenseDetailsController::class, 'expenseTypeUpdate'])->name('expenseType.update');
Route::post('/expense-delete',[ExpenseDetailsController::class, 'expenseTypeDelete'])->name('expenseType.delete');
Route::post('/expense-add',[ExpenseDetailsController::class, 'addNewExpense'])->name('newExpense.add');
