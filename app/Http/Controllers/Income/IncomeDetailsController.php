<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncomeTypeCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\Incometype;
use function Laravel\Prompts\select;

class IncomeDetailsController extends Controller
{

    public function index():view
    {

        $allIncomeData = Incometype::all()->pluck('id');

        Log::info($allIncomeData);
        return view('income.income-details',compact('allIncomeData'));

    }

    public function addNewIncomeType (IncomeTypeCreateRequest $request){

        $validatedIncomeRequest = $request->validated();

        if (Incometype::where('income_type', $validatedIncomeRequest['income_type'])->exists()) {
            return redirect()->back()->with('message', 'Income type already exists.');
        }

        Incometype::create([
            'income_type' => $validatedIncomeRequest['income_type'],
            'max_amount' => $validatedIncomeRequest['max_amount'],
            'min_amount' => $validatedIncomeRequest['min_amount']
        ]);

        return redirect()->back()->with('message', 'Income type added successfully.');

    }

}
