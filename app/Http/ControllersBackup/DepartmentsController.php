<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     
    public function index()
    {
        
        $departments = Department::all();
        return view('departments.index')->with('departments',$departments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "departmentname" => 'required'
        ]);

        $deptName =  Department::create([
             "departmentname" => $request->departmentname
        ]);
        return redirect('/admin/departments')->with([
            "success" => "Department added"
        ]);
            
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dept = Department::findOrFail($id);
        return view('departments.edit',compact('dept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "departmentname" => 'required'
        ]);
        $dept = Department::findOrFail($id);
        $dept->dptName = $request->input('departmentname');
        $dept->save();

        return redirect('/departments')->with([
            "success" => "Department added"
        ]); 
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
