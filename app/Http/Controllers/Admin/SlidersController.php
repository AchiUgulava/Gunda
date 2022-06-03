<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sliders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SlidersController extends Controller
{
    public function index()
    {
        

        if (!Auth::check()){
           $sliders = Sliders::all();
            return view('admin.sliders.sliders',[
                'sliders'=>$sliders,
        
        ]);
        } 

        else redirect()->route('home');
        
    }
    public function create()
    {
        if (!Auth::check()) return view('admin.sliders.createsliders');
        else redirect()->route('home');
        
    }
    public function store(Request $request)
    {
        
        $this->validate($request, [   
        
        'place'=>'required',
        'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);
        
        $slider = new Sliders();
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        if(!empty($request->href)) $slider->href = $request->href;
        $slider->place = $request->place;
        if(!empty($request->text)) $slider->text = $request->text;

        $slider->image = $imageName;
        $slider->save();
        
        return redirect()->route('sliders');
    }
    public function delete($id)
    {
        $slider=Sliders::find($id);
        unlink('images/'.$slider->image);
        $slider->delete();
        
        return redirect()->back();        
    }
}
