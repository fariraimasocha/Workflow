<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeStoreRequest;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees =Employee::all();
        return view('admin.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        $employee = Employee::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'account_number'=>$request->account_number,
            'employee_id'=>$request->employee_id,
            'phone_number'=>$request->phone_number,
            'job_title'=>$request->job_title,


        ]);

        if($request->has('companies')){
            $employee->companies()->attach($request->companies);
        }
        return to_route('admin.employees.index')->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies= Company::all();
        return view('admin.employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'account_number'=>'required',
            'phone_number'=>'required',
            'job_title'=>'required',
            'employee_id'=>'required',
        ]);

        $employee->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'account_number'=>$request->account_number,
            'phone_number'=>$request->phone_number,
            'job_title'=>$request->job_title,
            'employee_id'=>$request->employee_id,

           

        ]);
        return to_route('admin.employees.index')->with('success', 'Employee updated successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->companies()->detach();
        $employee->delete();
        return to_route('admin.employees.index')->with('danger', 'Employee deleted successfully');
    }
}
