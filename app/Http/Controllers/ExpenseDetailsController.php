<?php

namespace App\Http\Controllers;


use App\Models\ExpenseType;
use Illuminate\View\View;

class ExpenseDetailsController extends Controller
{
    public function index():view
    {

        $allExpenseData = ExpenseType :: all();

        return view('expense.expense-details' , compact('allExpenseData'));

    }
}
