<?php

namespace App\Http\Controllers;

use App\Models\employees;
use App\Http\Requests\StoreemployeesRequest;
use App\Http\Requests\UpdateemployeesRequest;

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

public function store(StoreemployeesRequest $request)
{
    $validated = $request->validated();
    employees::create($validated);
    return redirect()->route('pemployees.index')->with('success', 'Employee created successfully.');
}

public function show(employees $employees)
{
    return view('employees.show', compact('employees'));
}

public function edit(employees $employees)
{
    return view('employees.edit', compact('employees'));
}

public function update(UpdateemployeesRequest $request, employees $employees)
{
    $validated = $request->validated();
    $employees->update($validated);
    return redirect()->route('pemployees.index')->with('success', 'Employee updated successfully.');
}

public function destroy(employees $employees)
{
    $employees->delete();
    return redirect()->route('pemployees.index')->with('success', 'Employee deleted successfully.');
}
}
