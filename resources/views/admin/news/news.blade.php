@extends('admin.app')

@section('content')

 <div class="flex flex-col w-full h-screen overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6">
        <h1 class="w-full pb-6 text-3xl text-black">News</h1>

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
            <a class="inline-block w-1/4 px-4 py-2 m-2 font-semibold text-center text-green-600 bg-white rounded shadow hover:text-green-800" href="{{ route('news.create') }}">Add News</a>
           </div>
           <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="max-w-screen-md min-w-full divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        title
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        text
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        date
                        </th>
                        
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y-2 divide-gray-200">
                    @foreach ($news as $news)
                    <tr >
                        <div >
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full" src="/images/{{$news->image}}" alt="">
                                </div>
                                
                                <div class="ml-4 text-sm font-medium text-gray-900">
                                    {{ $news->title}}
                                </div>
                            </div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="pb-4 overflow-y-auto text-sm text-gray-900 ">
                            <p class="w-24">{!! $news->text !!}</p> 
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="pb-4 overflow-y-auto text-sm text-gray-900 ">
                            <p class="w-24">{{$news->created_at->format('d/m/y') }}</p> 
                                </div>
                                </td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="{{ route('news.edit',$news->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <br>
                            <a href="{{ route('news.delete',$news->id) }}" class="text-red-600 hover:text-red-900">Delete</a>
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
        </main>
    </div>

@endsection