<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditaboutController extends Controller
{
    public function index()
    {
        if (Auth::check()) return view('admin.editabout');
        else redirect()->route('home');
        
    }
}
