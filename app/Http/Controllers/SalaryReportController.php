<?php

namespace App\Http\Controllers;

use App\Models\Employee; 
use Illuminate\Http\Request;

class SalaryReportController extends Controller
{
    public function generateReport()
    {
       
        $employees = Employee::all();

      
        $totalSalary = $employees->sum('salary');

        
        $averageSalary = $employees->avg('salary');

       
        
        $employeeNames = $employees->pluck('name');

       
        return view('salary/salary_report', compact(
            'totalSalary', 
            'averageSalary', 
            'employeeNames'
        ));
    }
}

