<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tags;
use App\Models\Type;
use App\Models\Product;
use App\Models\Baseflavor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditmenuController extends Controller
{
    public function index()
    {
        $types=Type::all();
        $baseflavors=Baseflavor::all();
        $tags=Tags::all();
        $products=Product::all();

        if (Auth::check()) return view('admin.editmenu', [
            'types'=>$types,
            'baseflavors'=>$baseflavors,
            'tags'=>$tags,
            'products'=>$products,
        ]);

        else redirect()->route('home');
        
    }
    public function storeProduct(Request $request)
    {
        
        $this->validate($request, [   
        'name'=>'required',
        'description'=>'required',
        'price'=>'required',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        'type_id'=>'required',
        'baseflavor_id'=>'required',
        ]);


        $product= new Product();

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('product-images'), $imageName);
            
            $product->image= $imageName;
            $product->name= $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->type_id = $request->type_id;
            $product->baseflavor_id = $request->baseflavor_id;
        
        $product->save();
        if(is_array($request->tags)){
            $product->tags()->attach($request->tags);
        }
        return redirect()->back();
    }
}
