<?php

namespace App\Http\Controllers;

use App\Models\Employeemodel;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Leavescontroller extends Controller
{
    public function index()
    {
        return view("Employee.empleave");
    }

    public function store(Request $request)
    {
    $empid = Auth::id();
    // Validate the leave request
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'reason' => 'required|string',
    ]);
    
    // Find the user based on the "empid"
    $user = Employeemodel::find($empid);
    if (!$user) {
        return redirect('/DashBoard/Employee')->with('error', 'Employee not found');
    }

    $leave = new Leave();
    $leave->Empid = $user->id;
    $leave->start_date = $request->start_date;
    $leave->end_date = $request->end_date;
    $leave->reason = $request->reason;
    $leave->status = 'pending';
    $leave->save();

    // Redirect back with a success message
    return redirect('/DashBoard/Employee')->with('success', 'Leave request submitted successfully');
}



// For HR Use
    public function LeaveShow()
    {
        $leaves = Leave::get();
        return view ("Admin.leave",compact("leaves"));
    }
    public function approve($id)
    {
    // Find the leave request by ID
    $leave = Leave::findOrFail($id);

    // Update the status to "approved"
    $leave->status = 'approved';
    $leave->save();

    // Redirect back or to another page
    return redirect('/DashBoard/HR')->with('success', 'Leave request approved successfully.');
}

    public function reject($id)
    {
    $leave = Leave::findOrFail($id);

    // Update the status to "approved"
    $leave->status = 'rejected';
    $leave->save();

    // Redirect back or to another page
    return redirect('/DashBoard/HR')->with('success', 'Leave request rejected successfully.');
    }
}
