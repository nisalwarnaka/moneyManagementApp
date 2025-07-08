<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Incometype;
use function Laravel\Prompts\select;

class IncomedetailsController extends Controller
{

    public function index():view
    {

        $allIncomeData = Incometype::all();
        return view('income.income-details',compact('allIncomeData'));

    }

    public function addNewIncomeType (Request $request){

        //echo Incometype::all('income_type');
        //echo '{"income_type":"'.$request->incomeType.'"}';

       //if(Incometype::all('income_type') == 'income_type:'.$request->incomeType){

            //echo 'same-type';
        //}
        //else{
            //echo 'different-type';
        //}

        Incometype::create([

            'income_type' => $request->incomeType,
            'max_amount' => $request->maxAmount,
            'min_amount' => $request->minAmount

        ]);

        return redirect('/income')->with('message','Income-Type-Added-Successfully');

    }

}
