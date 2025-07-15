<?php

namespace App\Http\Controllers\expense;


use App\Http\Controllers\Controller;
use App\Http\Requests\expenseCreateRequest;
use App\Http\Requests\ExpenseTypeCreateRequest;
use App\Http\Requests\ExpenseTypeUpdateRequest;
use App\Http\Requests\ExpenseUpdateRequest;
use App\Models\ExpenseType;
use App\Models\ExpenseValue;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExpenseDetailsController extends Controller
{
    public function index():view
    {

        $allExpenseData = ExpenseType :: all();
        $results = ExpenseValue::all();

        return view('expense.expense-details' , compact('allExpenseData' , 'results'));

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

    public function expenseTypeUpdate(ExpenseTypeUpdateRequest $request) : string
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
    public function expenseTypeDelete(Request $request) : string
    {
        $id = $request->get('ExpenseTypeIdDeleteModel');

        ExpenseType::destroy($id);

        return redirect()->back()->with('message', 'Expense-type-delete-successfully.');

    }

    public function addNewExpense(expenseCreateRequest $request) : string
    {
        $validatedExpenseRequest = $request->validated();

        $query = ExpenseType::query();

        $query->where('id', $validatedExpenseRequest['ExpenseTypeIdForAddNewExpense']);

        $SelectExpenseType = $query->get();
        $SelectExpenseTypeMaxAmount = $SelectExpenseType[0]->max_amount;
        $SelectExpenseTypeMinAmount = $SelectExpenseType[0]->min_amount;


       if ($SelectExpenseTypeMaxAmount >= $validatedExpenseRequest['ExpenseValueForAddNewExpense'] & $SelectExpenseTypeMinAmount <= $validatedExpenseRequest['ExpenseValueForAddNewExpense'])
       {
           ExpenseValue::create([
               'expense_type_id' => $validatedExpenseRequest['ExpenseTypeIdForAddNewExpense'],
               'expense_type' => $validatedExpenseRequest['ExpenseTypeForAddNewExpense'],
               'expense_value' => $validatedExpenseRequest['ExpenseValueForAddNewExpense'],
               'special_note' => $validatedExpenseRequest['SpecialNoteForAddNewExpense'],
               'month' => $validatedExpenseRequest['TransactionMonthForAddNewExpense'],
           ]);
           return redirect()->back()->with('message', 'Expense-added-successfully.');

       }

        return redirect()->back()->with('message', 'fail !! Check-Expense-Value-Limitations.');

    }

    public function findExpense(Request $request)
    {

        $findExpenseType = $request->ExpenseTypeForFinder;
        $findTransactionMonth = $request->ExpenseMonthForFinder;
        $findTransactionDate = $request->ExpenseDateForFinder;

        $query = ExpenseValue::query();


        if ($findExpenseType != null) {
            $query->where('expense_type_id', $findExpenseType);
        }
        if ($findTransactionMonth != null) {
            $query->where('month', $findTransactionMonth);
        }
        if ($findTransactionDate != null) {
            $query->whereDate('created_at', $findTransactionDate);
        }
        $results = $query->get();
        $allExpenseData = ExpenseType :: all();

        return view('expense.expense-details',compact('results', 'allExpenseData'));
    }

    public function editExpenseTransaction(ExpenseUpdateRequest $request) : string
    {

        $validatedExpenseUpdateRequest = $request->validated();

        ExpenseValue::where('id', $validatedExpenseUpdateRequest['ExpenseTransactionIdForEditModel'])->update([
            'expense_value' => $validatedExpenseUpdateRequest['ExpenseValueForEditModel'],
            'special_note' => $validatedExpenseUpdateRequest['ExpenseSpecialNoteForEditModel'],
            'month' => $validatedExpenseUpdateRequest['ExpenseMonthForEditModel']
        ]);
        return redirect()->back()->with('message', 'Expense-transaction-update-successfully.');

    }
}
