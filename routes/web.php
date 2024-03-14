<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HRcontroller;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Leavescontroller;
use App\Http\Controllers\RecruitmentController;

// For HRController
Route::get("/", [HRcontroller::class,"index"]);
Route::post("/", [HRcontroller::class,"checkLogin"]);

Route::middleware(['admin'])->group(function () {
    //Admin routes
    Route::get('/DashBoard/Admin', [HRcontroller::class,"admindash"]);
});

Route::middleware(['hr'])->group
(
    function () 
    {
    // HR routes
    Route::get("/DashBoard/HR", [HRcontroller::class,"MainPage"]);

    // For Employee related details 
    Route::get("/AddUser", [HRcontroller::class,"EmployeeShow"]); //Employee Add page Route
    Route::post("/AddUser", [HRcontroller::class,"EmployeeAdd"]); //Employee Add page Route
    Route::get("/Edit/{id}/User", [HRcontroller::class,"EmployeeEdit"]); // Employee edit page Route
    Route::post("/Edit/{id}/User", [HRcontroller::class,"EmployeeUpdate"]);// Employee edit page
    Route::get("/Delete/{id}/User", [HRcontroller::class,"destroy"]); //Employee delete 

    // For Leave related routes
    Route::get('/EmployeeLeaveFiles', [Leavescontroller::class, 'LeaveShow']);
    Route::get('/leave/approve/{id}', [LeavesController::class, 'approve']);
    Route::get('/leave/reject/{id}', [Leavescontroller::class, 'reject']);

    // Recruitment related codes
    Route::get('/recruitment', [RecruitmentController::class, 'index'])->name('recruitment.index');
    // Route::get('/recruitment/create', [RecruitmentController::class, 'create'])->name('recruitment.create');
    // Route::post('/recruitment/store', [RecruitmentController::class, 'store'])->name('recruitment.store');
    // Route::get('/recruitment/{id}/edit', [RecruitmentController::class, 'edit'])->name('recruitment.edit');
    // Route::put('/recruitment/{id}/update', [RecruitmentController::class, 'update'])->name('recruitment.update');
    // Route::delete('/recruitment/{id}/delete', [RecruitmentController::class, 'delete'])->name('recruitment.delete');

    }
);

Route::middleware(['employee'])->group(function () {

    Route::get("/DashBoard/Employee", [HRcontroller::class,"employeedash"]); //Employee delete 

    // For leave related Routes
    Route::get('/leave', [Leavescontroller::class, 'index']);
    Route::post('/leave', [Leavescontroller::class, 'store']);
});


// Job related Works
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
//  Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
// Route::post('/jobs/{id}/apply', [JobController::class, 'apply'])->name('jobs.apply');


// Logout
Route::post("/logout", [HRcontroller::class,"logout"]);
