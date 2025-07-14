<?php

namespace App\Http\Controllers\expense;


use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseTypeCreateRequest;
use App\Http\Requests\ExpenseTypeUpdateRequest;
use App\Models\ExpenseType;
use Illuminate\View\View;

class ExpenseDetailsController extends Controller
{
    public function index():view
    {

        $allExpenseData = ExpenseType :: all();

        return view('expense.expense-details' , compact('allExpenseData'));

    }

    public function expenseTypeCreate(ExpenseTypeCreateRequest $request):string
    {
        $validatedExpenseRequest = $request->validated();

        if (ExpenseType::where('expense_type', $validatedExpenseRequest['expenseType'])->exists()) {
            return redirect()->back()->with('message', 'fail !! Expense-type-already-exists.');
        }

        ExpenseType::create([
            'expense_type' => $validatedExpenseRequest['expenseType'],
            'max_amount' => $validatedExpenseRequest['maxAmountForExpenseType'],
            'min_amount' => $validatedExpenseRequest['minAmountForExpenseType']
        ]);

        return redirect()->back()->with('message', 'Expense-type-added-successfully.');

    }

    public function expenseTypeUpdate(ExpenseTypeUpdateRequest $request)
    {
        $validatedExpenseRequest = $request->validated();

        if (ExpenseType::where('expense_type', $validatedExpenseRequest['ExpenseTypeModel'])->exists()) {


            $query = ExpenseType::query();

            $query->where('expense_type', $validatedExpenseRequest['ExpenseTypeModel']);

            $SelectExpenseType = $query->get();
            $SelectExpenseTypeId = $SelectExpenseType[0]->id;

           if ($SelectExpenseTypeId == $validatedExpenseRequest['ExpenseTypeIdModel'])
           {
               ExpenseType::where('id', $validatedExpenseRequest['ExpenseTypeIdModel'])->update([
                   'expense_type' => $validatedExpenseRequest['ExpenseTypeModel'],
                   'max_amount' => $validatedExpenseRequest['ExpenseMaxAmountModel'],
                   'min_amount' => $validatedExpenseRequest['ExpenseMinAmountModel']
               ]);

               return redirect()->back()->with('message', 'Expense-type-update-successfully.');

           }

            return redirect()->back()->with('message', 'Update Fail !! Expense-type-already-exists.');
        }
        else{

            ExpenseType::where('id', $validatedExpenseRequest['ExpenseTypeIdModel'])->update([
                'expense_type' => $validatedExpenseRequest['ExpenseTypeModel'],
                'max_amount' => $validatedExpenseRequest['ExpenseMaxAmountModel'],
                'min_amount' => $validatedExpenseRequest['ExpenseMinAmountModel']
            ]);

            return redirect()->back()->with('message', 'Expense-type-update-successfully.');

        }

    }
}
