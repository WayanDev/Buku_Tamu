<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tamu = BukuTamu::count();
        
        return view('dashboard',compact('tamu'));
    }
}
