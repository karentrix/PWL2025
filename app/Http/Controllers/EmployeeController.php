<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; 
class EmployeeController extends Controller
{
public function index()
{
   $employees = Employee::all(); 
   return view('employees.index', compact('employees'));
}

    public function create()
    {
        return view('employees.create'); 
    }
    
public function store(Request $request)
{
   $request->validate([
       'name' => 'required|string|max:50',
       'position' => 'required', 
       'salary' => 'required',
   ]);

   $employee = Employee::create([ 
       'name' => $request->name,
       'position' => $request->position, 
       'salary' => $request->salary,
   ]);

   return response()->json(
       [
           'message' => 'Pegawai berhasil disimpan',
           'employee'  => $employee, 
       ], 201
   );
}


public function destroy($id)
{
   $employee = Employee::find($id);

   if (!$employee) {
       return response()->json([
           'message' => 'Pegawai tidak ditemukan',
       ], 404);
   }

   $employee->delete(); 

   return response()->json(['message' => 'Pegawai telah dihapus']);
}

public function edit($id)
{
    $employee = Employee::find($id);

    if (!$employee) {
        return redirect()->route('employees.index')->with('error', 'Pegawai tidak ditemukan.');
    }

    return view('employees.edit', compact('employee'));
}
    
public function update(Request $request, $id)
{
   $request->validate([
       'name' => 'required|string|max:100',
       'position' => 'required', 
       'salary' => 'required',
   ]);

   $employee = Employee::find($id);

   if (!$employee) {
       return response()->json([
           'message' => 'Pegawai tidak ditemukan',
       ], 404);
   }

   $employee->update([
       'name' => $request->name,
       'position' => $request->position, 
       'salary' => $request->salary,
   ]);

   return response()->json([
       'message' => 'Pegawai berhasil diperbarui',
       'employee' => $employee, 
   ], 200);
}
}
