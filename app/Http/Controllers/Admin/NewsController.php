<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        

        if (!Auth::check()){
           $news = News::all();
            return view('admin.news.news',[
                'news'=>$news,
        
        ]);
        } 

        else redirect()->route('home');
        
    }
public function create()
    {
        if (!Auth::check()) return view('admin.news.createnews');
        else redirect()->route('home');
        
    }
    public function store(Request $request)
    {
        
        $imageName = time().'.'.$request->image->extension();
         $request->image->move(public_path('images'), $imageName);
        $news = [
            'en' => [
                'title'       => $request->input('en_title'),
                'text' => $request->input('en_text')
            ],
            'ge' => [
                'title'       => $request->input('ge_title'),
                'text' => $request->input('ge_text')
            ],
            'image' => $imageName,
         ];
         
         News::create($news);
        return redirect()->route('news');
    }
    public function delete($id)
    {
        $news=News::find($id);
        unlink('images/'.$news->image);
        $news->delete();
        
        return redirect()->back();        
    }

    public function edit($id)
    {
        $news = News::find($id);
        
        if (!Auth::check()) return view('admin.news.editnews',  
        [
            'news'=> $news,
        ]);
        
        else redirect()->route('home');
    }


    public function update(Request $request , $id)
    {
        $news= News::findOrFail($id);
        
         
        if(!empty($request->image)){ 
            $this->validate($request, ['image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            unlink('images/'.$news->image);
        }
        else{
            $imageName=$news->image;
            }

            
        $news_data = [
            'en' => [
                 'title'       => $request->input('en_title'),
                 'text' => $request->input('en_text')
             ],
             'ge' => [
                'title'       => $request->input('ge_title'),
                'text' => $request->input('ge_text')
                ],
                'image' => $imageName,
            ];
            
        

        $news->update($news_data);
             
        return redirect()->route('news') ;
     }


}
