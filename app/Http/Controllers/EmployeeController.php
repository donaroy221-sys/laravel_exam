<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
 
    public function index()
    {
         $employees = Employee::paginate(2);
        return view('index', compact('employees'));
    }


    public function create()
    {
        Gate::authorize('create', Employee::class);
        return view('add');
    }

   
    public function store(Request $request)
    {
        Gate::authorize('create', Employee::class);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'designation' => 'required',
            'salary' => 'required',
            'photo' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:10240',
            
        ]);

        $slug = Str::slug($request->name);
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->slug = $slug;
        $employee->email = $request->email;
         $employee->phone = $request->phone;
          $employee->designation = $request->designation;
           $employee->salary = $request->salary;
      
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $name);
            $employee->photo = $name;
        }

       
        $employee->save();

        return redirect()->route('employee.index')
                         ->with('success', 'employee created successfully');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        Gate::authorize('update', $employee);
        return view('edit', compact('employee'));
    }

   
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        Gate::authorize('update', $employee);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'designation' => 'required',
            'salary' => 'required',
            'photo' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:10240',
        ]);

        $employee->name = $request->name;
        $employee->email = $request->email;
         $employee->phone = $request->phone;
          $employee->designation = $request->designation;
           $employee->salary = $request->salary;
       

        if ($request->hasFile('photo')) {
          
            $oldPath = public_path('/uploads/' . $employee->photo);
            if (is_file($oldPath)) unlink($oldPath);

            $file = $request->file('photo');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $name);
            $employee->photo = $name;
        }

     
        $employee->save();

        return redirect()->route('employee.index')
                         ->with('success', 'employee updated successfully');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        Gate::authorize('delete', $employee);

        $employee->delete();

        return redirect()->route('employee.index')
                         ->with('success', 'employee deleted successfully');
    }
}



