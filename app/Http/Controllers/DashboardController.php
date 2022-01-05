<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Cache::rememberForever('dashboard.companies', function() {
            return Company::with('employees')
                ->orderBy('created_at', 'desc')
                ->get();
        });

        $employees = Cache::rememberForever('dashboard.employees', function() {
            return Employee::with('company')
                ->orderBy('created_at', 'desc')
                ->get();
        });
        return view('dashboard', [
            'companies' => $companies,
            'employees' => $employees]);
    }
}
