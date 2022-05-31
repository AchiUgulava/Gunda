<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tags;
use App\Models\Type;
use App\Models\Product;
use App\Models\Baseflavor;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditmenuController extends Controller
{
    public function index()
    {
        $categories=Categories::all();
        
        if (Auth::check()) return view('admin.product.categories',  
        [
            'categories'=>$categories, 
        ]);
        
        else redirect()->route('home');
    }

    public function store(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $categories = [
            'en' => [
                'name'       => $request->input('en_name'),
                'description' => $request->input('en_description')
            ],
            'ge' => [
                'name'       => $request->input('ge_name'),
                'description' => $request->input('ge_description')
            ],
            'image'=>$imageName
         ];
        Categories::create($categories);
        
        return redirect()->back();
    }

    public function delete($id)
    {
        $categories=Categories::find($id);
        unlink('images/'.$categories->image);
        $categories->delete();
        
        return redirect()->back();        
    }
    public function updateStatus(Request $request )
    {
        $category=Categories::find($request->categories_id);
        
        
        $category->status = $request->status;
    
        $category->save();
        
        return redirect()->route('categories') ;
     }
}
