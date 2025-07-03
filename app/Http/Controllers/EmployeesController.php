<?php

namespace App\Http\Controllers;

use App\Models\employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = employees::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|unique:employees,nip',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);
        employees::create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(employees $employees)
    {
        return view('employees.show', compact('employees'));
    }

    public function edit(employees $employee)
{
    return view('employees.edit', compact('employee'));
}

public function update(Request $request, employees $employee)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'nip' => 'required|string|unique:employees,nip,' . $employee->id,
        'department' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
    ]);
    $employee->update($validated);
    return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
}

    public function destroy(employees $employees)
    {
        $employees->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
