<?php

namespace App\Http\Controllers;

use App\Models\Sliders;
use Illuminate\Http\Request;
use App\Models\ContactPageText;

class ContactController extends Controller
{
    public function index()
    {
    $text = ContactPageText::first();
    $sliders = Sliders::where('place','home')->get();
        return view('contact',[
            'text' => $text,
            'sliders'=>$sliders
        ]);
    }
}
