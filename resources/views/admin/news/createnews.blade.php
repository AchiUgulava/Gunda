@extends('admin.app')

@section('content')

 <div class="flex flex-col w-full h-screen overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6">
        <h1 class="w-full pb-6 text-3xl text-black">Add news</h1>

         @if ($errors->any())
               <div class="text-red-500 alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <a class="inline-block w-1/4 px-4 py-2 m-2 font-semibold text-center text-gray-600 bg-white rounded shadow hover:text-gray-800" href="{{ route('news') }}">Go back</a>
          <div class="container max-w-5xl m-8 mx-auto">
            <form action="{{ route('news.store') }}" class="p-10 bg-white rounded shadow-xl" method="POST" enctype="multipart/form-data">
                  @csrf
                  
                {{-- ge title --}}
                
                <div class="">
                    <label class="block text-sm text-gray-600 " for="ge_title">ge title</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded lg:w-1/2"  name="ge_title" type="text" placeholder="title"  value="{{ old('ge_title', '') }}" >
                </div>
                
                {{-- ge text --}}
                <div class="mt-2">
                    <label class="block text-sm text-gray-600 " for="ge_text">ge text</label>
                    <textarea id="mytextareaGe" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded lg:w-2/3"  name="ge_text" rows="6"  >{{ old('ge_text') }}</textarea>
                </div>
                {{-- en title --}}
                <div class="">
                    <label class="block text-sm text-gray-600 " for="en_title">en title</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded lg:w-1/2"  name="en_title" type="text" placeholder="title" value="{{ old('en_title', '') }}"    >
                </div>
                
                {{--en text --}}
                <div class="mt-2">
                    <label class="block text-sm text-gray-600 " for="message">en text</label>
                    <textarea id="mytextareaEn" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded lg:w-2/3"  name="en_text" rows="6"   >{{ old('en_text') }}</textarea>
                </div>
                {{-- image --}}
                <div>
                    <label class="block my-2 text-sm text-gray-600" for="image">upload image</label>
                    <input type="file" name="image" class="py-1 pl-1 overflow-auto bg-gray-200 border-2 rounded" placeholder="upload image"     >
                </div>
                
                {{-- submit --}}
                <div class="mt-6">
                    <button class="px-4 py-1 font-light tracking-wider text-white bg-gray-900 rounded" type="submit">Submit</button>
                </div>
                  
            </form>
          </div>
        
        </main>
    </div>

@endsection