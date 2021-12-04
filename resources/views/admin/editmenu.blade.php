@extends('admin.app')

@section('content')

<div class="flex flex-col w-full h-screen overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6">
        <h1 class="pb-6 text-3xl text-black">Edit Menu</h1>

        <div class="w-full mt-6" x-data="{ openTab: 1 }">
            <div>
                <ul class="flex border-b">
                    <li class="mr-1 -mb-px" @click="openTab = 1">
                        <a :class="openTab === 1 ? 'border-l border-t border-r rounded-t text-green-700 font-semibold' : 'text-green-600 hover:text-green-800'" class="inline-block px-4 py-2 font-semibold bg-white" href="#">Add</a>
                    </li>
                    <li class="mr-1 -mb-px" @click="openTab = 2">
                        <a :class="openTab === 2 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="inline-block px-4 py-2 font-semibold bg-white" href="#">Edit</a>
                    </li>
                    <li class="mr-1 -mb-px" @click="openTab = 3">
                        <a :class="openTab === 3 ? 'border-l border-t border-r rounded-t text-red-700 font-semibold' : 'text-red-600 hover:text-red-900'" class="inline-block px-4 py-2 font-semibold bg-white" href="#">Delete</a>
                    </li>

                </ul>
            </div>

            <div class="p-6 bg-white">

                {{-- add item to menu --}}

                <div id="" class="" x-show="openTab === 1">
                    <div class="w-full pr-0 my-6 lg:pr-2">
                        <p class="flex items-center pb-6 text-xl">
                            <i class="mr-3 fas fa-list"></i> Menu item
                        </p>
                        <div class="leading-loose">
                            <form action="{{ route('editmenu.store') }}" class="p-10 bg-white rounded shadow-xl" method="POST" enctype="multipart/form-data">
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
                                {{-- name --}}
                                <div class="">
                                    <label class="block text-sm text-gray-600 " for="name">Name</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded lg:w-1/2" id="name" name="name" type="text" placeholder="Item name" required="" aria-label="Name">
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
                                  </div>

                                {{-- description --}}
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600 " for="message">Description</label>
                                    <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded lg:w-2/3" id="description" name="description" rows="6" required="" placeholder="description"></textarea>
                                </div>

                                {{-- price --}}
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="email">price</label>
                                    <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded lg:w-1/2" id="price" name="price" type="text" required="" placeholder="$">
                                </div>
                                {{-- image --}}
                            
                                      <div>
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


                <div id="" class="" x-show="openTab === 2">
                    Curabitur at lacinia felis. Curabitur elit ante, efficitur molestie iaculis non, blandit dictum dui. Fusce ac faucibus lorem, in aliquet metus. Praesent bibendum justo vitae ante imperdiet, sit amet posuere tortor tincidunt. Nam a arcu eros. In vitae augue tempus, ullamcorper lectus ut, egestas erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean imperdiet eget sapien nec consequat. Etiam imperdiet diam ac mattis gravida.
                </div>
                <div id="" class="" x-show="openTab === 3">
                    Duis imperdiet ullamcorper nibh, sed euismod dolor facilisis sit amet. Etiam quis cursus lorem. Vivamus euismod accumsan neque lobortis tempus. Praesent nec lacinia odio, a dictum risus. Sed eget dictum turpis, vitae iaculis orci. Vivamus laoreet consequat velit, non viverra diam pulvinar a. Aliquam bibendum ligula lacus, ac convallis ipsum hendrerit ut. Suspendisse rutrum dui libero, non aliquam lectus lobortis at. Donec gravida finibus sollicitudin. Nulla ut metus finibus purus vehicula porttitor. Fusce id sem non nisl pulvinar scelerisque.
                </div>
            </div>
        </div>
    </main>
</div>

@endsection