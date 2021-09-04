<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) return view('admin.index');
        else redirect()->route('home');
        
    }
}
