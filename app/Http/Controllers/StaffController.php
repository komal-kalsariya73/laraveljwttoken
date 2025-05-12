<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
     public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'phone' => 'nullable',
            'email' => 'required|email|unique:employees',
            'password' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $employee = new Employee();
        $employee->fname = $request->fname;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
    $employee->password = Hash::make($request->password);
        $employee->gender = $request->gender;
        $employee->city = $request->city;
        $employee->address = $request->address;

        // Image upload
        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/employees'), $fileName);
            $employee->image = 'uploads/employees/'.$fileName;
        }

        $employee->save();

        return response()->json(['success' => 'Employee added successfully!']);
    }
    public function employeeview(){
        return view('pages.view-emp');
    }
    public function getAllEmployees()
{
    $employees = Employee::all();

    return response()->json($employees);
}
public function editpage($id){

    $employee = Employee::findOrFail($id); // fetch employee data by ID
    return view('pages.edit-emp', compact('employee'));
}
}
