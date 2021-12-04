@extends('admin.app')

@section('content')

<div class="flex flex-col w-full h-screen overflow-x-hidden border-t">
    

    <div class="p-6 bg-gray-200">

    {{-- add product --}}

    
        <div class="w-full pr-0 my-6 lg:pr-2">
            <p class="flex items-center pb-6 text-xl">
                <i class="mr-3 fas fa-list"></i>add product
            </p>
            <a class="inline-block w-1/4 px-4 py-2 m-2 font-semibold text-center text-gray-600 bg-white rounded shadow hover:text-gray-800" href="{{ route('products') }}">Go back</a>
            <div class="leading-loose shadow">
                <form action="{{ route('products.store') }}" class="p-10 bg-white rounded shadow-xl" method="POST" enctype="multipart/form-data">
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
                    
                    {{--ge name --}}
                    
                        <div class="w-full p-1 md:w-1/2 ">
                            <label class="block text-sm text-gray-600 " for="name">Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded lg:w-1/2 " id="name" name="ge_name" type="text" placeholder="ge" required="" aria-label="Name" value="{{ old('ge_name', '') }}">
                    </div>
                    {{-- en name --}}
                    
                    <div class="w-full p-1 md:w-1/2 ">
                        <label class="block text-sm text-gray-600 " for="name">Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded lg:w-1/2" id="name" name="en_name" type="text" placeholder="en" required="" aria-label="Name" value="{{ old('en_name', '') }}">
                        </div>
                    {{-- type --}}
                    <div class="mt-4">
                        <span class="text-gray-700"> Type</span>
                        <div class="mt-2">
                            @foreach($types as $type)
                            <label class="inline-flex items-center border-2 rounded">
                                <input required="" type="radio" class="ml-2 form-radio" name="type_id" value="{{ $type->id }}">
                                <span class="mr-2">{{ $type->name }}</span>
                            </label>
                            @endforeach
                        </div>
                        </div>

                        {{-- base flavor --}}
                        <div class="mt-4">
                        <span class="text-gray-700">Base flavor</span>
                        <div class="mt-2">
                            @foreach($baseflavors as $baseflavor)
                            <label class="inline-flex items-center border-2 rounded">
                                <input required="" type="radio" class="ml-2 form-radio" name="baseflavor_id" value="{{ $baseflavor->id }}">
                                <span class="mr-2">{{ $baseflavor->name }}</span>
                            </label>
                            @endforeach
                        </div>
                        {{-- ge description --}}
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600 " for="ge_description">ge description</label>
                            <textarea id="mytextareaGe" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded lg:w-2/3"  name="ge_description" rows="6"  >{{ old('ge_description') }}</textarea>
                        </div>
                        {{-- en description --}}
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600 " for="en_description">en description</label>
                            <textarea id="mytextareaEn" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded lg:w-2/3"  name="en_description" rows="6"   >{{ old('en_description') }}</textarea>
                        </div>
                   

                    {{-- price --}}
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">price</label>
                        <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded lg:w-1/2" id="price" name="price" type="text" required="" placeholder="$">
                    </div>
                    {{-- image --}}
                
                            <div class="overflow-x-hidden">
                            <label class="block my-2 text-sm text-gray-600 " for="image">upload image</label>
                            <input type="file" name="image" class="px-1 py-1 bg-gray-200 border-2 rounded " placeholder="upload image" required="">
                            </div>
                        
                    {{-- tags --}}
                    <div class="block pt-4">
                        <span class="text-gray-700">tags</span>
                        <div class="mt-2">
                            @foreach($tags as $tag)
                            <div>
                                <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="tags[]" id="tags" value="{{ $tag->id}}">
                                <span class="ml-2">{{ $tag->name }}</span>
                                </label>
                            </div>
                            @endforeach
                        </div>
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