@extends('admin.app')

@section('content')

<div class="flex flex-col w-full h-screen overflow-x-hidden border-t">
    

    <div class="p-6 bg-gray-200">

    {{-- add slider --}}

    
        <div class="w-full pr-0 my-6 lg:pr-2">
            <p class="flex items-center pb-6 text-xl">
                <i class="mr-3 fas fa-list"></i>create slider
            </p>
            <a class="inline-block w-1/4 px-4 py-2 m-2 font-semibold text-center text-gray-600 bg-white rounded shadow hover:text-gray-800" href="{{ route('products') }}">Go back</a>
            <div class="leading-loose shadow">
                <form action="{{ route('sliders.store') }}" class="p-10 bg-white rounded shadow-xl" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- text --}}
                    <div class="">
                        <label class="block text-sm text-gray-600 " for="text">text</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded lg:w-1/2" id="text" name="text" type="text" placeholder="slider text"  aria-label="Name">
                    </div>

                   
                    {{-- href --}}
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="href">link</label>
                        <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded lg:w-1/2" id="href" name="href" type="text"  placeholder="$">
                    </div>
                    {{-- image --}}
                
                            <div class="pb-2">
                            <label class="block my-2 text-sm text-gray-600 " for="image">upload image</label>
                            <input type="file" name="image" class="px-1 py-1 bg-gray-200 border-2 rounded " placeholder="upload image" required="">
                            </div>
                    {{-- place --}}
                    <div class="relative inline-flex ">
                        <svg class="absolute top-0 right-0 w-2 h-2 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                        <select class="h-10 pl-5 pr-10 text-gray-800 bg-gray-200 border border-gray-300 rounded-full appearance-none hover:border-gray-400 focus:outline-none" name="place" id="place" required="">
                            <option value="home">home</option>
                            <option value="menu">menu</option>
                            <option value="about">about</option>
                            <option value="contact">contact</option>
                            </select>
                    </div>

                    {{-- submit --}}
                    <div class="mt-6">
                        <button class="px-4 py-1 font-light tracking-wider text-white bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div> 
        
    </div>
       
</div>

@endsection