<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'selectedIncomeIdInCreateIncome' => ['required'],
            'selectedIncomeNameInCreateIncome' =>['required'],
            'incomeValueInCreateIncome' => ['required'],
            'incomeMonthInCreateIncome' =>['required'],
            'incomeSpecialNoteInCreateIncome' => ['nullable'],

        ];
    }
}
