<?php

namespace App\Http\Controllers;

use App\Models\Employeemodel;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HRcontroller extends Controller
{
    // For main Login page
    public function index()
    {
        return view("Admin.Adminlogin");
    }

    public function EmployeeShow()
    {
        return view("Employee.EmpAdd");
    }

    public function EmployeeAdd(Request $request)   
    {
        $request ->validate
        ([
            'empid' => 'required|max:255|string',
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|string',
            'role' => 'required|max:255|string',
            'username' => 'required|max:255|string',
            'password' => 'required|max:255|string' ,  
            'confirmpassword' => 'required|max:255|string' ,          
        ]);
            Employeemodel::create(
                [
                    'empid'=> $request->empid,
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'role'=> $request->role,
                    'username'=> $request->username,
                    'password'=> $request->password,
                    'confirmpassword'=> $request->confirmpassword,
                ]
            );
            return redirect('/DashBoard/HR')->with('success','Added');
    }

    // For Check the role of the user
    public function checkLogin(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");
        $user = Employeemodel::where("email", $email)->first();
        if ($user) 
        {
            if ($password === $user->password)
            {
                Auth::login($user);
                switch ($user->role)
                 {
                    case "admin":
                        return redirect('/DashBoard/Admin');
                    case 'hr':
                        return redirect('/DashBoard/HR');
                    case 'employee':
                        return redirect('/DashBoard/Employee');
                    default:
                        return redirect('/');
                }
            }
            else
            {
                return redirect("/")->with('error', 'Invalid password');
            }
        }
        else 
        {
            return redirect("/")->with('error', 'User not found');
        }
    }

    public function admindash()
    {
        return view('Admin.welcome');
    }

    // Hr dashboard and belove are hr functions
    public function MainPage()
    {
        $employee = Employeemodel::get();
        return view("Admin.AdminPanel", compact("employee"));
    }
    
    public function EmployeeEdit($id)
    {
        $employee = Employeemodel::find($id);
        return view('Employee.EmpEdit', compact('employee'));
    }   

    public function EmployeeUpdate(Request $request, int $id)   
    {
        //dd($request);
        $request ->validate([
            'empid' => 'required|max:255|string',
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|string',
            'role' => 'required|max:255|string',
            'username' => 'required|max:255|string',
        ]);

        Employeemodel::findorFail($id)->update(
            [
                'empid'=> $request->empid,
                'name'=> $request->name,
                'email'=> $request->email,
                'role'=> $request->role,
                'username'=> $request->username,
            ]
        );

        return redirect('/DashBoard/HR')->with('success','Updated');
    }

    public function destroy(int $id)
    {
        $student = Employeemodel::findorFail($id);
        $student->delete();
        return redirect('/DashBoard/HR')->with('success','Deleted');
    }

    // For Employee
    public function employeedash()
    {
       $EmpLeave = Leave::get();
        return view('Employee.Employeewelcome',compact('EmpLeave'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
