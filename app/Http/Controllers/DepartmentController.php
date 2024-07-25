<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = Department::all();
        return view('departments.index', compact('data'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('status', 'Department added successfully!');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index')->with('status', 'Department updated successfully!');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('status', 'Department deleted successfully!');
    }
}
