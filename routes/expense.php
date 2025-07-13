<?php


use App\Http\Controllers\ExpenseDetailsController;
use Illuminate\Support\Facades\Route;





Route::get('/expense',[ExpenseDetailsController::class, 'index'])->name('expense.index');
