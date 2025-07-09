<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncomeTypeCreateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Incometype;
use function Laravel\Prompts\select;

class IncomeDetailsController extends Controller
{

    public function index():view
    {

        $allIncomeData = Incometype::all();
        return view('income.income-details',compact('allIncomeData'));

    }

    public function addNewIncomeType (IncomeTypeCreateRequest $request){

        $validatedIncomeRequest = $request->validated();

        Incometype::create([
            'income_type' => $validatedIncomeRequest-incomeType,
            'max_amount' => $request->maxAmount,
            'min_amount' => $request->minAmount

        ]);

       // return redirect('/income')->with('message','Income-Type-Added-Successfully');

    }

}
