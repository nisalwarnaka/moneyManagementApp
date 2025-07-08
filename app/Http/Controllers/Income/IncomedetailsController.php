<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncomedetailsController extends Controller
{

    public function index():view
    {

        return view('income.income-details');

    }

}
