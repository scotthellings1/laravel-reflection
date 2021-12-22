<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::all()->count();
        $employees = Employee::all()->count();
        return view('dashboard', [ 'companies' => $companies, 'employees' => $employees]);
    }
}
