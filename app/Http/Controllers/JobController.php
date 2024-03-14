<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index()
    {
        return view("Jobs.jobindex");
    }
  
}
