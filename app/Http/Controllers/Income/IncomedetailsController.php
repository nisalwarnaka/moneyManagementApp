<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Incometype;

class IncomedetailsController extends Controller
{

    public function index():view
    {

        return view('income.income-details');

    }

    public function addNewIncomeType (Request $request){

        Incometype::create([
            'income_type' => $request->incomeType,
            'max_amount' => $request->maxAmount,
            'min_amount' => $request->minAmount

        ]);

       // dd(Incometype::all());
       return redirect('/income')->with('message','Income-Type-Added-Successfully');

    }

}
