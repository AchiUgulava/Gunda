<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use App\Models\Sliders;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\ContactPageText;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    
    public function index()
    {
     $news = News::latest()->limit(3)->get();
     $newProducts = Product::latest()->limit(3)->get();
     $categories = Categories::where('status', true)->get();
     $contact = ContactPageText::first();
     $sliders = Sliders::where('place','home')->get();
        return view('home',[
             'news' => $news,
             'newProducts' =>$newProducts,
             'contact' => $contact,
             'categories' => $categories,
             'sliders' => $sliders
        ]);
    }
    public function news()
    {
        $news = News::paginate(5);
        return view('news',[
            'news' => $news,
            
       ]);
    }
}
