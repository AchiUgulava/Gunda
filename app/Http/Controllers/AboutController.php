<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use App\Models\AboutPageText;
use App\Models\Sliders;

class AboutController extends Controller
{
    
    public function index()
    {
        $text = AboutPageText::first();
        $sliders = Sliders::where('place','menu')->get();
        return view('about',[
            'text' => $text,
            'sliders' => $sliders
        ]);
    }
}
