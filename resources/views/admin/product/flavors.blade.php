@extends('admin.app')

@section('content')
<div class="flex flex-col w-full h-screen overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6">
            <p class="flex items-center pb-6 text-xl">
                <i class="mr-3 fas fa-list"></i>flavors
            </p>
            
           
            <a class="inline-block w-1/4 px-4 py-2 m-2 font-semibold text-center text-gray-600 bg-white rounded shadow hover:text-gray-800" href="{{ route('products') }}">Go back</a>
           

           <div class="leading-loose shadow ">
            <form action="{{ route('products.flavor.store') }}" class="p-4 my-1 bg-white rounded shadow-xl " method="POST" enctype="multipart/form-data">
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
                <div class="flex flex-wrap items-center">
                 <div class="w-full p-1 md:w-1/3 ">
                    <input class="w-full px-5 py-2 m-2 text-gray-700 bg-gray-200 rounded " id="name" name="ge_name" type="text" placeholder="ge add Flavor" required="" aria-label="ge Flavor Name" value="{{ old('ge_name', '') }}">
                </div>
                {{-- en name --}}
                
                    <div class="w-full p-1 md:w-1/3 ">
                       <input class="w-full px-5 py-2 m-2 text-gray-700 bg-gray-200 rounded " id="name" name="en_name" type="text" placeholder="en add Flavor" required="" aria-label="en Flavor Name" value="{{ old('en_name', '') }}">
                   </div>
                {{-- submit --}}
                <div class="justify-center w-1/3 p-1 ">
                    <button class="inline-block px-4 py-2 m-2 font-semibold text-center text-green-600 bg-white rounded shadow hover:text-green-800" type="submit">Submit</button>
                </div>   
                </div>
                
            
            </form>
        </div>


            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Name
                        </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y-2 divide-gray-200">
                    @foreach ($baseflavors as $baseflavor)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                        
                            <div class="text-sm text-gray-500">
                                {{$baseflavor->name}}
                            </div>
                            
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                        <a href="{{ route('products.flavor.delete', $baseflavor->id) }}" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                </table>
                </div>
            </div>
        </div> 
        </main>
    
</div>
@endsection