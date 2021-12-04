
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


        <form action="{{ route('login') }}" method="POST">
            
            @csrf

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Your email"
                class="bg-gray-100 border-2 p-1 w-full text-center rounded-lg @error('email') border-red-500 
                @enderror" value="{{ old('email') }}">
                
                @error('email')
                    <div class="mt-2 mb-2 text-sm text-red-500"> 
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a password"
                class="bg-gray-100 border-2 p-1 w-full text-center rounded-lg @error('password') border-red-500 
                @enderror" value="">
                
                @error('password')
                    <div class="mt-2 mb-2 text-sm text-red-500"> 
                        {{ $message }}
                    </div>
                 @enderror
            </div>

            

            <div>
                <button type="submit" class="w-full px-4 py-3 font-medium text-white bg-gray-600 rounded">Login</button>
            </div>
        </form>
    </div>
</div>
