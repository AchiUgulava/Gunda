@extends('admin.app')

@section('content')
<div class="flex flex-col w-full h-screen overflow-x-hidden border-t ">
    <main class="flex-grow w-full md:p-6 ">
            
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
            <a class="inline-block w-1/3 px-4 py-2 m-2 font-semibold text-center text-green-600 bg-white rounded shadow md:w-1/5 hover:text-green-800" href="{{ route('products.create') }}">Add product</a>
            <a class="inline-block w-1/3 px-4 py-2 m-2 font-semibold text-center text-blue-600 bg-white rounded shadow md:w-1/5 hover:text-blue-800" href="{{ route('products.flavors') }}">flavors</a>
            <a class="inline-block w-1/3 px-4 py-2 m-2 font-semibold text-center text-blue-600 bg-white rounded shadow md:w-1/5 hover:text-blue-800" href="{{ route('products.tags') }}">tags</a>
            <a class="inline-block w-1/3 px-4 py-2 m-2 font-semibold text-center text-blue-600 bg-white rounded shadow md:w-1/5 hover:text-blue-800" href="{{ route('products.types') }}">types</a>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="max-w-screen-md divide-y divide-gray-200 table-auto lg:min-w-full">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Available
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        price
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        type
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        tags
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y-2 divide-gray-200">
                    @foreach ($products as $product)
                    <tr >
                        <div >
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full" src="/images/{{$product->image}}" alt="">
                                </div>
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $product->name}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $product->baseflavor->name}}
                                </div>
                                </div>
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap"  >
                                 
                                 <div class="flex items-center justify-center white" >
                                <input type="checkbox" data-id="{{ $product->id }}" name="status" class="js-switch"  {{ $product->status  ? 'checked' : '' }}>
                                    {{-- status --}}
                                </div>   
                            
                                
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="pb-4 overflow-y-auto text-sm text-gray-900 ">
                            <p class="w-24">{{ $product->description }}</p> 
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                {{ $product->price }}
                            </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $product->type->name}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                <div class="w-24 pb-4 overflow-y-auto">
                                    @foreach ($product->tags as $tag)
                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-800 bg-blue-100 rounded-full">
                                    {{ $tag->name}}
                                    </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="{{ route('products.edit',$product->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <br>
                            <a href="{{ route('products.delete',$product->id) }}" class="text-red-600 hover:text-red-900">Delete</a>
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
                var product_id = $(this).data('id');
            
            $.ajax({
            type: "GET",
            dataType: "json",
            url: "/adminPannel/products/status/update",
            data: {'status': status, 'product_id': product_id},
            success: function (data) {
                console.log(data.success);
            }
        });
    });
}); 
        </script>
</div>
@endsection