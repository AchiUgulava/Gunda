<!DOCTYPE html>
<html lang="en">
    <head>
    
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>
          login
        </title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        
    </head>


<div class="flex justify-center">
    <div class="w-4/12 p-6 bg-white rounded-lg">
        @if (session('status'))
             <div class="p-4 mb-4 font-medium text-center text-white bg-red-500 rounded-lg">
                {{ session('status') }}
            </div>
        @endif


        <form action="{{ route('register') }}" method="POST">
            
            @csrf
            <div class="form-group">
                <label for="name" class="sr-only">Name:</label>
                <input type="text"  id="name" name="name" class="bg-gray-100 border-2 p-1 w-full text-center rounded-lg">
            </div>
    
            <div class="form-group">
                <label for="email" class="sr-only">Email:</label>
                <input type="email"  id="email" name="email" class="bg-gray-100 border-2 p-1 w-full text-center rounded-lg">
            </div>
    
            <div class="form-group">
                <label for="password" class="sr-only">Password:</label>
                <input type="password"  id="password" name="password" class="bg-gray-100 border-2 p-1 w-full text-center rounded-lg">
            </div>
    
            <div class="form-group">
                <button style="cursor:pointer" type="submit" class="bg-gray-100 border-2 p-1 w-full text-center rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</div>


