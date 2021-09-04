<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditcontactController extends Controller
{
    public function index()
    {
        if (Auth::check()) return view('admin.editcontact');
        else redirect()->route('home');
        
    }
}
