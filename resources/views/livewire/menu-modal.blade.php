<div>
    <x-modal wire:model="show">
        
           @if (!$product==null)
           <div class="flex flex-wrap p-3 mx-auto">
            {{-- image --}}
            <img alt="Gunda icecream" class="object-cover object-center w-full rounded-lg shadow lg:w-1/2" src="/images/{{$product->image}}">
            <div class="w-full mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
              {{-- name and flavors  --}}
              <h2 class="text-sm tracking-widest text-gray-600 title-font">{{ $product->baseflavor->name }} {{ $product->type->name }}</h2>
              <h1 class="mb-1 font-medium text-gray-900 title-font">{{ $product->name }}</h1>
          
              <div class="overflow-hidden rounded">
                <p class="p-2 leading-relaxed">{!! $product ->description !!}</p>
              </div>
              
              
            </div>
           </div>
           <div class="flex items-center pb-5 mt-6 overflow-x-hidden border-b-2 border-gray-200">
              @foreach ($product->tags as $tag)
              <div class="flex">
              <h3 class="px-2 pb-1 mx-1 text-sm font-semibold leading-5 text-gray-800 bg-blue-100 rounded-full">
                {{ $tag->name }}
              </h3>
            </div>
              @endforeach
              
          </div>
          <a class="rounded-b-xl " href="{{ route('menu.item', [$product->id] , true, app()->getLocale()) }}">
            <h2 class="py-1 mx-auto text-sm font-light text-center text-white title-font gradient ">
            {{ __('show more') }}
            </h2>
          </a>
           @endif
        </div>
    </x-modal>
</div> 
