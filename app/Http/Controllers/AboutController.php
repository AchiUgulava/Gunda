<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use App\Models\AboutPageText;

class AboutController extends Controller
{
    
    public function index()
    {
        $text = AboutPageText::first();
        return view('about',[
            'text' => $text,
        ]);
    }
}
