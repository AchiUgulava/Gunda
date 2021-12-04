<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactPageText;

class ContactController extends Controller
{
    public function index()
    {
    $text = ContactPageText::first();
        return view('contact',[
            'text' => $text,
        ]);
    }
}
