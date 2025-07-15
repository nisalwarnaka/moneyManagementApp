<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncomeCreateRequest;
use App\Http\Requests\IncomeTypeCreateRequest;
use App\Http\Requests\IncomeTypeUpdateRequest;
use App\Http\Requests\IncomeUpdateRequest;
use App\Models\IncomeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\IncomeType;
use function Laravel\Prompts\select;

class IncomeDetailsController extends Controller
{

    public function index():view
    {

        $allIncomeData = IncomeType::all();
        $allIncomeTransactionsData = IncomeValue::all();
        $results = IncomeValue::all();
        //$allIncomeData = IncomeType::all()->pluck('id');

        //Log::info($allIncomeData);
        return view('income.income-details',compact('allIncomeData','allIncomeTransactionsData','results'));

    }

    public function addNewIncomeType (IncomeTypeCreateRequest $request): string
    {

        $validatedIncomeRequest = $request->validated();

        if (IncomeType::where('income_type', $validatedIncomeRequest['income_type'])->exists()) {
            return redirect()->back()->with('message', 'fail !! Income-type-already-exists.');
        }

        IncomeType::create([
            'income_type' => $validatedIncomeRequest['income_type'],
            'max_amount' => $validatedIncomeRequest['max_amount'],
            'min_amount' => $validatedIncomeRequest['min_amount']
        ]);

        return redirect()->back()->with('message', 'Income-type-added-successfully.');

    }

    public function update(IncomeTypeUpdateRequest $request) : string
    {
        $validatedIncomeRequest = $request->validated();

        if (IncomeType::where('income_type', $validatedIncomeRequest['incomeTypeModel'])->exists()) {

            $query = IncomeType::query();

            $query->where('income_type', $validatedIncomeRequest['incomeTypeModel']);

            $SelectIncomeType = $query->get();
            $SelectIncomeTypeId = $SelectIncomeType[0]->id;

            if ($SelectIncomeTypeId == $validatedIncomeRequest['incomeId'])
            {
                IncomeType::where('id', $validatedIncomeRequest['incomeId'])->update([
                    'income_type' => $validatedIncomeRequest['incomeTypeModel'],
                    'max_amount' => $validatedIncomeRequest['maxAmount'],
                    'min_amount' => $validatedIncomeRequest['minAmount']
                ]);

                return redirect()->back()->with('message', 'Income-type-update-successfully.');

            }

            return redirect()->back()->with('message', 'Update Fail !! Income-type-already-exists.');
        }


        IncomeType::where('id', $validatedIncomeRequest['incomeId'])->update([
            'income_type' => $validatedIncomeRequest['incomeTypeModel'],
            'max_amount' => $validatedIncomeRequest['maxAmount'],
            'min_amount' => $validatedIncomeRequest['minAmount']
        ]);

        return redirect()->back()->with('message', 'Income-type-update-successfully.');

    }

    public function delete(Request $request): string
    {

        $id = $request->get('incomeIdDelete');

        IncomeType::destroy($id);

        return redirect()->back()->with('message', 'Income-type-delete-successfully.');
    }

   public function addNewIncome(IncomeCreateRequest $request) : string
   {
       $validatedIncomeRequest = $request->validated();
       $query = IncomeType::query();

       $query->where('id', $validatedIncomeRequest['selectedIncomeIdInCreateIncome']);

       $SelectIncomeType = $query->get();
       $SelectIncomeTypeMaxAmount = $SelectIncomeType[0]->max_amount;
       $SelectIncomeTypeMinAmount = $SelectIncomeType[0]->min_amount;


       if ($SelectIncomeTypeMaxAmount >= $validatedIncomeRequest['incomeValueInCreateIncome'] & $SelectIncomeTypeMinAmount <= $validatedIncomeRequest['incomeValueInCreateIncome'])
       {
           IncomeValue::create([
               'income_type_id' => $validatedIncomeRequest['selectedIncomeIdInCreateIncome'],
               'income_type' => $validatedIncomeRequest['selectedIncomeNameInCreateIncome'],
               'income_value' => $validatedIncomeRequest['incomeValueInCreateIncome'],
               'special_note' => $validatedIncomeRequest['incomeSpecialNoteInCreateIncome'],
               'month' => $validatedIncomeRequest['incomeMonthInCreateIncome'],
           ]);
           return redirect()->back()->with('message', 'Income-added-successfully.');
       }

       return redirect()->back()->with('message', 'fail !! Check-Income-Value-Limitations.');

   }

   public function find(Request $request) : string
   {

       $findIncomeType = $request->incomeTypeForFind;
       $findTransactionMonth = $request->transactionMonthForFind;
       $findTransactionDate = $request->transactionDateForFind;

       $query = IncomeValue::query();


       if ($findIncomeType != null) {
           $query->where('income_type_id', $findIncomeType);
       }
       if ($findTransactionMonth != null) {
           $query->where('month', $findTransactionMonth);
       }
       if ($findTransactionDate != null) {
           $query->whereDate('created_at', $findTransactionDate);
       }
       $results = $query->get();
       $allIncomeData = IncomeType::all();
       $allIncomeTransactionsData = IncomeValue::all();

       return view('income.income-details',compact('results', 'allIncomeData','allIncomeTransactionsData'));

   }

   public function incomeTransactionUpdate(IncomeUpdateRequest $request) : string
   {
       $validatedIncomeUpdateRequest = $request->validated();

       IncomeValue::where('id', $validatedIncomeUpdateRequest['incomeTransactionId'])->update([
           'income_value' => $validatedIncomeUpdateRequest['incomeTransactionValue'],
           'special_note' => $validatedIncomeUpdateRequest['incomeTransactionSpecialNote'],
           'month' => $validatedIncomeUpdateRequest['incomeTransactionMonth']
       ]);
       return redirect()->back()->with('message', 'Income-transaction-update-successfully.');

   }

   public function incomeTransactionDelete(Request $request) : string
   {
       $id = $request->get('incomeTransactionIdForDelete');

       IncomeValue::destroy($id);

       return redirect()->back()->with('message', 'Income-Transaction-delete-successfully.');

   }

}

