<?php

namespace App\Http\Controllers;

use App\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::with(['country', 'profile'])->get()->toArray();
    }
}
