<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController2 extends Controller
{
    public function dashboard()
    {
        return view('v2.dashboard');

        // return abort(403);
    }

    public function employee(Request $request)
    {
        return view('v2.employee');

        // return view('datatable.serverside',compact('request'));
    }

    public function create(Request $request)
    {
        return view('v2.employee-create');

        // return view('datatable.serverside',compact('request'));
    }
}
