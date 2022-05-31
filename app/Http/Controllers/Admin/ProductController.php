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

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        if (Auth::check()) return view('admin.product.products',[
            'products'=>$products,
        ]);
        else redirect()->route('home');
        
    }
   

    public function create()
    {
        $types=Type::all();
        $baseflavors=Baseflavor::all();
        $tags=Tags::all();
        
        if (Auth::check()) return view('admin.product.createproduct', [
            'types'=>$types,
            'baseflavors'=>$baseflavors,
            'tags'=>$tags,
        ]);
        
        else redirect()->route('home');
        
    }

    public function store(Request $request)
    {

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
       $product = [
           'en' => [
               'name'       => $request->input('en_name'),
               'description' => $request->input('en_description')
           ],
           'ge' => [
               'name'       => $request->input('ge_name'),
               'description' => $request->input('ge_description')
           ],
           'image' => $imageName,
           'price'=>$request->price,
           'type_id'=>$request->type_id,
           'baseflavor_id'=>$request->baseflavor_id,
           'status'=> true,
        ];
        Product::create($product);
        $productTags = Product::all() -> last();
        if(is_array($request->tags)){
            $productTags->tags()->attach($request->tags);
        }
        return redirect()->route('products');
    }

    public function delete($id)
    {
        $product=Product::find($id);
        unlink('images/'.$product->image);
        $product->delete();
        
        return redirect()->back();        
    }

    public function edit($id)
    {
        $product=Product::find($id);
        $types=Type::all();
        $baseflavors=Baseflavor::all();
        $tags=Tags::all();
        $productTags=$product->tags()->pluck('id');
        if (Auth::check()) return view('admin.product.editproduct',  
        [
            'id'=>$id,
            'product'=>$product,
            'types'=>$types,
            'baseflavors'=>$baseflavors,
            'tags'=>$tags,
            'productTags'=>$productTags,
            
        ]);
       
         
        else redirect()->route('home');
    }


    public function update(Request $request , $id)
    {
        
        $this->validate($request, [   
        'name'=>'required',
        'description'=>'required',
        'price'=>'required',
        'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        'type_id'=>'required',
        'baseflavor_id'=>'required',
        ]);

        $product=Product::find($id);
        if(!empty($request->image)){
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product->image= $imageName;
        }
    
        $product->name= $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->type_id = $request->type_id;
        $product->baseflavor_id = $request->baseflavor_id;
    
        $product->save();
        if(is_array($request->tags)){
            
            $product->tags()->sync($request->tags);
        }
        return redirect()->route('products') ;
     }
     public function updateStatus(Request $request )
     {
         
        
 
         $product=Product::find($request->product_id);
         
         
         $product->status = $request->status;
     
         $product->save();
         
         return redirect()->route('products') ;
      }

     public function flavors()
    {
        $baseflavors=Baseflavor::all();
        
        if (Auth::check()) return view('admin.product.flavors',  
        [
            'baseflavors'=>$baseflavors, 
        ]);
        
        else redirect()->route('home');
    }

    public function storeflavor(Request $request)
    {
        
        $flavor = [
            'en' => [
                'name'       => $request->input('en_name'),
                
            ],
            'ge' => [
                'name'       => $request->input('ge_name'),
                
            ],
           
         ];
         
         Baseflavor::create($flavor);
        
        return redirect()->route('products.flavors') ;
    }

    public function deleteflavor($id)
    {
        $baseflavor=Baseflavor::find($id);
        $baseflavor->delete();
        
        return redirect()->back();        
    }

    public function tags()
    {
        $tags=Tags::all();
        
        if (Auth::check()) return view('admin.product.tags',  
        [
            'tags'=>$tags, 
        ]);
        
        else redirect()->route('home');
    }

    public function storetag(Request $request)
    {
        
       
        $tag = [
            'en' => [
                'name'       => $request->input('en_name'),
                
            ],
            'ge' => [
                'name'       => $request->input('ge_name'),
                
            ],
           
         ];
        Tags::create($tag);
        
        return redirect()->route('products.tag.store') ;
    }

    public function deletetag($id)
    {
        $tag=Tags::find($id);
        $tag->delete();
        
        return redirect()->back();        
    }

    public function types()
    {
        $types=Type::all();
        $categories=Categories::all();
        if (Auth::check()) return view('admin.product.types',  
        [
            'types'=>$types,
            'categories' =>$categories, 
        ]);
        
        else redirect()->route('home');
    }

    public function storetypes(Request $request)
    {
        
       
        $type = [
            'en' => [
                'name'       => $request->input('en_name'),
                
            ],
            'ge' => [
                'name'       => $request->input('ge_name'),
                
            ],
           'categories_id'=> $request->categories_id
         ];
        Type::create($type);
        
        return redirect()->route('products.types.store') ;
    }

    public function deletetypes($id)
    {
        $type=Type::find($id);
        $type->delete();
        
        return redirect()->back();        
    }
}