@extends('admin.app')

@section('content')
<div class="flex flex-col w-full h-screen overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6">
            <p class="flex items-center pb-6 text-xl">
                <i class="mr-3 fas fa-list"></i>categories
            </p>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Available
                            </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            description
                            </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y-2 divide-gray-200">
                    @foreach ($categories as $category)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                        
                            <div class="text-sm text-gray-500">
                                {{$category->name}}
                            </div>
                            
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap"  >
                            <div class="flex items-center justify-center white" >
                           <input type="checkbox" data-id="{{ $category->id }}" name="status" class="js-switch"  {{ $category->status  ? 'checked' : '' }}>
                               {{-- status --}}
                           </div> 
                       </td>
                        <td class="px-6 py-4 whitespace-nowrap ">
                        
                            <div class="text-sm text-gray-500 w-80 overflow-hidden">
                                {{$category->description}}
                            </div>
                            
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                        <a href="{{ route('categories.delete', $category->id) }}" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div> 
        <div class="leading-loose shadow ">
            <form action="{{ route('categories.store') }}" class="p-4 my-1 bg-white rounded shadow-xl " method="POST" enctype="multipart/form-data">
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
                       <input class="w-full px-5 py-2 m-2 text-gray-700 bg-gray-200 rounded " id="name" name="ge_name" type="text" placeholder="ge add categories" required="" aria-label="ge categories Name" value="{{ old('ge_name', '') }}">
                   </div>
                   {{-- en name --}}
                   
                       <div class="w-full p-1 md:w-1/3 ">
                          <input class="w-full px-5 py-2 m-2 text-gray-700 bg-gray-200 rounded " id="name" name="en_name" type="text" placeholder="en add categories" required="" aria-label="en categories Name" value="{{ old('en_name', '') }}">
                      </div>
                      {{-- ge description --}}
                    
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600 " for="ge_description">ge description</label>
                        <textarea id="mytextareaGe" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded lg:w-2/3"  name="ge_description" rows="6"  >{{ old('ge_description') }}</textarea>
                    </div>
                    {{-- en description --}}
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600 " for="en_description">en description</label>
                        <textarea id="mytextareaEn" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded lg:w-2/3"  name="en_description" rows="6"   >{{ old('en_description') }}</textarea>
                    </div>
                </div>
                {{-- images --}}
                <div class="overflow-x-hidden">
                    <label class="block my-2 text-sm text-gray-600 " for="image">upload image</label>
                    <input type="file" name="image" class="px-1 py-1 bg-gray-200 border-2 rounded " placeholder="upload image" required="">
                    </div>
                
                {{-- submit --}}
                <div class="w-1/3 p-1 ">
                    <button class="inline-block px-4 py-2 m-2 font-semibold text-center text-green-600 bg-white rounded shadow hover:text-green-800" type="submit">Submit</button>
                </div>  
            </form>
        </div>
        </main>
        <script>
            let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            elems.forEach(function(html) {
                let switchery = new Switchery(html,  { size: 'small' });
            });
        </script>
        <script>
            $(function() {
             $('.js-switch').change(function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var category_id = $(this).data('id');
            
            $.ajax({
            type: "GET",
            dataType: "json",
            url: "/adminPannel/categories/status/update",
            data: {'status': status, 'categories_id': category_id},
            success: function (data) {
                console.log(data.success);
            }
        });
    });
}); 
        </script>
</div>
@endsection