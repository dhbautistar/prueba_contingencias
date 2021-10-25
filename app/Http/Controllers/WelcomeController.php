<?php

namespace App\Http\Controllers;

use App\Models\programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{

public function welcome()
    {
        $programas =  programa::all();
        
        return view('welcome', compact('programas'));
    }
}  