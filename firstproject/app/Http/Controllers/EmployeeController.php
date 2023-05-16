<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeePostRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('employees.index');
        $employees = Employee::paginate(5);
         return view('employees.index',compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeePostRequest $request): RedirectResponse
    {

        $employees= Employee::create($request->all());
        $employees->save();
        return redirect()->route('employees.index')->with('status','User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        Employee::find($employee->id)->update($request->all());

        return redirect()->route('employees.index')->with('status','Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('status','Product deleted successfully');
    }
}
