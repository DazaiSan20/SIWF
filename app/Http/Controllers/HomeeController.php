<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeeController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Pastikan ada file resources/views/dashboard.blade.php
    }
}
