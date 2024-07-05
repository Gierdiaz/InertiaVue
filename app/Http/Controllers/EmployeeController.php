<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    /**
     * Retrieves all employees and renders the 'Employee/Index' view with the employees data.
     *
     * @return \Inertia\Response The rendered 'Employee/Index' view with the employees data.
     */
    public function index()
    {
        $employees = Employee::query()->orderBy('id', 'asc')->get();

        return Inertia::render('Employee/Index', [
            'employees' => EmployeeResource::collection($employees),
        ]);
    }

    /**
     * Retrieves an employee by their ID and returns the 'Employee/Show' view with the employee data.
     *
     * @param  Employee  $employee  The employee to retrieve.
     * @return \Inertia\Response The rendered 'Employee/Show' view with the employee data.
     */
    public function show(Employee $employee)
    {
        $employee = Employee::findOrFail($employee->id);

        return Inertia::render('Employee/Show', [
            'employee' => $employee,
            // 'employee' => EmployeeResource::make($employee),

        ]);
    }

    /**
     * Create a new employee and render the 'Employee/Create' view.
     *
     * @return \Inertia\Response The rendered 'Employee/Create' view.
     */
    public function create()
    {
        return Inertia::render('Employee/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request  The HTTP request object.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone'   => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        Employee::create([
            'name'    => $request->name,
            'address' => $request->address,
            'phone'   => $request->phone,
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Renders the 'Employee/Edit' view with the given employee.
     *
     * @param  Employee  $employee  The employee to be edited.
     * @return \Inertia\Response The rendered 'Employee/Edit' view.
     */
    public function edit(Employee $employee)
    {
        return Inertia::render('Employee/Edit', [
            'employee' => $employee,
        ]);
    }

    /**
     * Update an employee record based on the provided request data.
     *
     * @param  Request  $request  The HTTP request object.
     * @param  Employee  $employee  The employee to be updated.
     * @return RedirectResponse The redirection to the employees index page.
     */
    public function update(Request $request, Employee $employee)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone'   => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $employee->update([
            'name'    => $request->name,
            'address' => $request->address,
            'phone'   => $request->phone,
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Deletes an employee record from the database.
     *
     * @param  Employee  $employee  The employee record to be deleted.
     * @return void
     */
    public function destroy(Employee $employee)
    {
        if ($employee->delete()) {
            return redirect()->route('employees.index');
        }

        return redirect()->back();
    }
}
