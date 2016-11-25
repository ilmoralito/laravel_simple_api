<?php

namespace App\Http\Controllers;

use App\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index($date1, $date2)
    {
        return Transaction::whereBetween('date', [$date1, $date2])->get()->toArray();
    }
}
