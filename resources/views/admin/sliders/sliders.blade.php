@extends('admin.app')

@section('content')
<div class="flex flex-col w-full h-screen overflow-x-hidden border-t ">
    <main class="flex-grow w-full p-6 ">
            
            @if ($errors->any())
               <div class="text-red-500 alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <div class="flex flex-wrap p-2 m-2" >
            <a class="inline-block w-1/4 px-4 py-2 m-2 font-semibold text-center text-green-600 bg-white rounded shadow hover:text-green-800" href="{{ route('sliders.create') }}">Add slider</a>
            
           </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                            {{-- homepage sliders --}}

                <h3 class="p-3 text-lg bold">Homepage sliders</h3>
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="max-w-screen-md divide-y divide-gray-200 table-auto lg:min-w-full">
                    <thead class="bg-gray-50">
                        
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        image
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        link
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        text
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            place
                            </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y-2 divide-gray-200">
                        @foreach ($sliders->where('place','home') as $slider)
                        <tr >
                            <div >
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-40">
                                    <img class="w-40 rounded-sm" src="/images/{{$slider->image}}" alt="">
                                    </div>
                                    
                                </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="pb-4 overflow-y-auto text-sm text-gray-900 ">
                                <p class="w-24">{{ $slider->href }}</p> 
                                </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $slider->text }}
                                </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $slider->place}}
                                </td>
                                
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                
                                <a href="{{ route('sliders.delete',$slider->id) }}" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                        </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                        {{-- menu sliders --}}
                <h3 class="p-3 text-lg bold">menu sliders</h3>
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="max-w-screen-md divide-y divide-gray-200 table-auto lg:min-w-full">
                    <thead class="bg-gray-50">
                        
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        image
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        link
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        text
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            place
                            </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y-2 divide-gray-200">
                        @foreach ($sliders->where('place','menu') as $slider)
                        <tr >
                            <div >
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-40">
                                    <img class="w-40 rounded-sm" src="/images/{{$slider->image}}" alt="">
                                    </div>
                                    
                                </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="pb-4 overflow-y-auto text-sm text-gray-900 ">
                                <p class="w-24">{{ $slider->href }}</p> 
                                </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $slider->text }}
                                </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $slider->place}}
                                </td>
                                
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                
                                <a href="{{ route('sliders.delete',$slider->id) }}" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                        </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                            {{-- about gunda sliders --}}
                <h3 class="p-3 text-lg bold">about Gunda sliders</h3>
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="max-w-screen-md divide-y divide-gray-200 table-auto lg:min-w-full">
                    <thead class="bg-gray-50">
                        
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        image
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        link
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        text
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            place
                            </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y-2 divide-gray-200">
                        @foreach ($sliders->where('place','about') as $slider)
                        <tr >
                            <div >
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-40">
                                    <img class="w-40 rounded-sm" src="/images/{{$slider->image}}" alt="">
                                    </div>
                                    
                                </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="pb-4 overflow-y-auto text-sm text-gray-900 ">
                                <p class="w-24">{{ $slider->href }}</p> 
                                </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $slider->text }}
                                </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $slider->place}}
                                </td>
                                
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                
                                <a href="{{ route('sliders.delete',$slider->id) }}" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                        </div>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
                </div>
                        {{-- contact page sliders --}}
                <h3 class="p-3 text-lg bold">contact page sliders</h3>
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="max-w-screen-md divide-y divide-gray-200 table-auto lg:min-w-full">
                    <thead class="bg-gray-50">
                        
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        image
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        link
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        text
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            place
                            </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y-2 divide-gray-200">
                        @foreach ($sliders->where('place','contact') as $slider)
                        <tr >
                            <div >
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-40">
                                    <img class="w-40 rounded-sm" src="/images/{{$slider->image}}" alt="">
                                    </div>
                                    
                                </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="pb-4 overflow-y-auto text-sm text-gray-900 ">
                                <p class="w-24">{{ $slider->href }}</p> 
                                </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $slider->text }}
                                </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $slider->place}}
                                </td>
                                
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                
                                <a href="{{ route('sliders.delete',$slider->id) }}" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                        </div>
                        </tr>
                        @endforeach
                    <!-- More people... -->
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div> 
        </main>
        
</div>
@endsection