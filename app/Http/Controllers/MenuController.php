<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Type;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\TagsTranslation;
use App\Models\CategoriesTranslation;

class MenuController extends Controller
{
    public function index()
    {
        $products = Product::where('status', true)->get();
        $types = Type::all();
        $categories = Categories::all();
        $tags = Tags::all();
        return view('menu',['products'=>$products, 'types'=>$types,'categories'=>$categories, 'tags' => $tags]);
    }
    public function category($name)
    {
        $categoryId = CategoriesTranslation::where('name', $name )->first();
        $typeIds = Type::where('categories_id',$categoryId->categories_id )->pluck('id')->toArray();
        $category = Categories::where('id',$categoryId->categories_id)->first();
        $types = Type::wherein('id',$typeIds)->get();
        
        $products = Product::wherein('type_id',$typeIds)->get();
         
        
        
        return view('category',[ 'category'=>$category, 'types'=>$types, 'products'=>$products ]);
    }
    public function tags($name)
    {
        $tagId = TagsTranslation::where('name', $name )->first();
        $tag = Tags::where('id', $tagId->tags_id )->first();
      
        $taggedProducts = Product::with('tags')->wherehas('tags', function($query) use ($tagId){$query->where('tags_id',$tagId->tags_id);})->get();
        $typeIds = $taggedProducts->pluck('type_id')->toArray();
      
        $types = Type::wherein('id',$typeIds)->get();
       
        return view('category',[ 'category'=>$tag, 'types'=>$types, 'products'=>$taggedProducts ]);
      }

    public function item($id)
    {
        $product=Product::find($id);

        return view('menuitem', [ 'id'=>$id, 'product'=>$product]);
        
       
    }
}
