<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
