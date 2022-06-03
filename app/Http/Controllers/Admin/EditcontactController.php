<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ContactPageText;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditcontactController extends Controller
{
    public function index()
    {
        

        if (!Auth::check()){
            if(!empty(ContactPageText::count()))$text=ContactPageText::first();
            else {$text = new ContactPageText([
                'en' => [
                'title'       =>'en_title',
                'text' => 'en_text'
            ],
            'ge' => [
               'title'  =>  'ge_title',
               'text' => 'ge_text'
            ]
            ]);
            $text->save();}
            return view('admin.editcontact',['text' => $text]);
        } 

        else redirect()->route('home');
        
    }

    
        
    public function store(Request $request)
    {
        $text= ContactPageText::first();
        

        $text_data = [
            'en' => [
                    'title'       => $request->input('en_title'),
                    'text' => $request->input('en_text')
                ],
                'ge' => [
                'title'       => $request->input('ge_title'),
                'text' => $request->input('ge_text')
            ]];

        $text->update($text_data);
        return redirect()->back();
    }

}
