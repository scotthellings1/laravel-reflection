<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::with('employees')
            ->orderBy('created_at', 'desc')
            ->get();
        $employees = Employee::with('company')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('dashboard', [
            'companies' => $companies,
            'employees' => $employees]);
    }
}
