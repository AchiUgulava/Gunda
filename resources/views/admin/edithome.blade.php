@extends('admin.app')

@section('content')

 <div class="flex flex-col w-full h-screen overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6">
        <h1 class="w-full pb-6 text-3xl text-black">Edit Home</h1>

         @if ($errors->any())
               <div class="text-red-500 alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
        

           
        </main>
    </div>

@endsection