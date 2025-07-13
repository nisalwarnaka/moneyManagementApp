<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncomeCreateRequest;
use App\Http\Requests\IncomeTypeCreateRequest;
use App\Http\Requests\IncomeTypeUpdateRequest;
use App\Models\IncomeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\Incometype;
use function Laravel\Prompts\select;

class IncomeDetailsController extends Controller
{

    public function index():view
    {

        $allIncomeData = Incometype::all();
        //$allIncomeData = Incometype::all()->pluck('id');

        Log::info($allIncomeData);
        return view('income.income-details',compact('allIncomeData'));

    }

    public function addNewIncomeType (IncomeTypeCreateRequest $request): string
    {

        $validatedIncomeRequest = $request->validated();

        if (Incometype::where('income_type', $validatedIncomeRequest['income_type'])->exists()) {
            return redirect()->back()->with('message', 'fail !! Income-type-already-exists.');
        }

        Incometype::create([
            'income_type' => $validatedIncomeRequest['income_type'],
            'max_amount' => $validatedIncomeRequest['max_amount'],
            'min_amount' => $validatedIncomeRequest['min_amount']
        ]);

        return redirect()->back()->with('message', 'Income-type-added-successfully.');

    }

    public function update(IncomeTypeUpdateRequest $request) : string
    {
        $validatedIncomeRequest = $request->validated();

        if (Incometype::where('income_type', $validatedIncomeRequest['incomeType'])->exists()) {

            return redirect()->back()->with('message', 'Update Fail !! Income-type-already-exists.');
        }


        Incometype::where('id', $validatedIncomeRequest['incomeId'])->update([
            'income_type' => $validatedIncomeRequest['incomeType'],
            'max_amount' => $validatedIncomeRequest['maxAmount'],
            'min_amount' => $validatedIncomeRequest['minAmount']
        ]);

        return redirect()->back()->with('message', 'Income-type-update-successfully.');

    }

    public function delete(Request $request): string
    {

        $id = $request->get('incomeIdDelete');

        Incometype::destroy($id);

        return redirect()->back()->with('message', 'Income-type-delete-successfully.');
    }

   public function addNewIncome(IncomeCreateRequest $request)
   {
       $validatedIncomeRequest = $request->validated();
        //dd($validatedIncomeRequest);
       IncomeValue::create([
           'income_type_id' => $validatedIncomeRequest['selectedIncomeIdInCreateIncome'],
           'income_type' => $validatedIncomeRequest['selectedIncomeNameInCreateIncome'],
           'income_value' => $validatedIncomeRequest['incomeValueInCreateIncome'],
           'special_note' => $validatedIncomeRequest['incomeSpecialNoteInCreateIncome'],
           'month' => $validatedIncomeRequest['incomeMonthInCreateIncome'],
       ]);
       return redirect()->back()->with('message', 'Income-added-successfully.');
   }

}

