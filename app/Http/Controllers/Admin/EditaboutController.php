<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\AboutPageText;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditaboutController extends Controller
{
    public function index()
    {
        

        if (!Auth::check()){
            if(!empty(AboutPageText::count()))$text=AboutPageText::first();
            else {$text = new AboutPageText([
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
            return view('admin.editabout',['text' => $text]);
        } 

        else redirect()->route('/');
        
    }

    public function store(Request $request)
    {
        $text= AboutPageText::first();
        

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
