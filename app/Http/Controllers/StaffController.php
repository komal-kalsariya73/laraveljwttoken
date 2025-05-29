<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeEmployeeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User; // Add this at the top
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
class StaffController extends Controller
{
  public function store(Request $request):JsonResponse
{
    $validator = Validator::make($request->all(), [
        'fname'    => 'required|string|max:255',
        'phone'    => 'nullable|string|max:15',
        'email'    => 'required|email|unique:employees,email|unique:users,email',
        'password' => 'required|min:6',
        'gender'   => 'required|in:male,female',
        'city'     => 'required',
        'address'  => 'required|string',
        'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }


    // ✅ Save user record first
    $user = new User();
    $user->name = $request->fname;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = 'employee';
    $user->profile_image = null; // will be updated after image upload
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->gender = $request->gender;
    $user->location = $request->city;
    $user->remember_token = Str::random(60);
    $user->save();

    // ✅ Create employee and link with user_id
    $employee = new Employee();
    $employee->fname = $request->fname;
    $employee->phone = $request->phone;
    $employee->email = $request->email;
    $employee->password = Hash::make($request->password);
    $employee->gender = $request->gender;
    $employee->city = $request->city;
    $employee->address = $request->address;
    $employee->user_id = $user->id; // Link user_id

    if ($request->hasFile('image')) {
        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/employees'), $fileName);
        $employee->image = 'uploads/employees/'.$fileName;

        // update user profile image
        $user->profile_image = $employee->image;
        $user->save();
    } else {
        $employee->image = 'uploads/employees/default-profile.jpg';
        $user->profile_image = $employee->image;
        $user->save();
    }

    $employee->save();

    // ✅ Send welcome email
    Mail::to($employee->email)->send(new WelcomeEmployeeMail($employee));

    return response()->json(['success' => 'Employee and user account created successfully!']);
}

    public function employeeview(){
          $user = Auth::user();

    if ($user->role === 'admin') {
        $employees = Employee::all(); // admin sees all
    } else {
        $employees = Employee::where('email', $user->email)->get(); // employee sees only their data
    }

        return view('pages.view-emp',compact('employees', 'user'));
    }
   public function getAllEmployees()
{
    $employees = DB::table('users')
        ->join('employees', 'users.id', '=', 'employees.user_id') // use correct table name
        ->where('users.role', 'employee')
        ->get();

    return response()->json($employees);
}
public function editpage($id){

    $employee = Employee::findOrFail($id); // fetch employee data by ID
    return view('pages.edit-emp', compact('employee'));
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'fname' => 'required',
        'phone' => 'nullable',
        'email' => 'required|email|unique:employees,email,' . $id,
        'gender' => 'required',
        'city' => 'required',
        'address' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()]);
    }

    $employee = Employee::findOrFail($id);
    $employee->fname = $request->fname;
    $employee->phone = $request->phone;
    $employee->email = $request->email;
    $employee->gender = $request->gender;
    $employee->city = $request->city;
    $employee->address = $request->address;

    // ✅ Update image if new image is uploaded
    if ($request->hasFile('image')) {
        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/employees'), $fileName);
        $employee->image = 'uploads/employees/'.$fileName;
    }

    $employee->save();

    return response()->json(['success' => 'Employee updated successfully!']);
}
public function destroy($id)
{
    $employee = Employee::findOrFail($id);

    // Delete image file if exists and not default
    if ($employee->image && $employee->image !== 'uploads/employees/default-profile.jpg') {
        $imagePath = public_path($employee->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $employee->delete();

    return response()->json(['success' => 'Employee deleted successfully']);
}

}
