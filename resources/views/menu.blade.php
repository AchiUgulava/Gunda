@extends('layouts.app')

@section('content')

<!DOCTYPE html>

<html lang="en">
    

    <body class="leading-normal tracking-normal text-white gradient" style=" font-family: 'Source Sans Pro', 'Noto Sans Georgian', sans-serif;">
      
        {{-- title --}}
        <div class="pt-24 pb-32 gradient">
            <div class="container flex flex-col flex-wrap items-center px-3 mx-auto md:flex-row">
              <div class="flex flex-col items-start justify-center w-full text-center md:w-2/5 md:text-left">
                
                <h1 class="my-8 text-5xl font-bold leading-tight text-center text-white">
                  {{ __('Our Menu') }}
                </h1>

                
              </div>
            </div>
          </div>
          {{-- wave --}}
          <div class="relative -mt-48 lg:-mt-48">
            <svg viewBox="0 0 1428 174" version="1.1" >
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                  <path
                    d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                    opacity="0.100000001"
                  ></path>
                  <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <path
                    d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
                  ></path>
                </g>
              </g>
            </svg>
          </div>
            {{-- menu --}}
            <section class="py-8 bg-white border-b">
              <div class="container flex flex-wrap pt-4 pb-12 mx-auto">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                 {{ __('Our Menu') }}
                </h1>
                <div class="w-full mb-4">
                  <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient">
                  </div>
                </div>
                @foreach($categories as $category)
                <div class="flex flex-col flex-grow flex-shrink w-full p-6 md:w-1/3">
                  <div class="flex-1 overflow-hidden bg-white rounded-t rounded-b-none shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                     
                      <div class="justify-center w-full px-6 text-xl font-bold text-center text-gray-800">
                     {{ $category->name }}
                      </div>
                      <p class="px-6 mb-5 text-base text-gray-800">
                      {!! $category->description !!} 
                      </p>
                    </a>
                  </div>
                  <div class="flex-none p-6 mt-auto mb-10 overflow-hidden bg-white rounded-t-none rounded-b shadow">
                    <div class="flex items-center justify-center">
                      <a class="px-8 py-4 mx-auto my-6 font-bold text-white transition duration-300 ease-in-out transform rounded-full shadow-lg lg:mx-0 hover:underline gradient focus:outline-none focus:shadow-outline hover:scale-105" href="{{ route('menu.category', $category->translate('en')->name  )}}">
                          {{ __('show more') }}
                        <a>
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="container flex py-4 overflow-y-auto lg:justify-center ">
                  @foreach ($tags as $tag)
                  <div class="px-1 m-1 font-semibold leading-5 text-gray-800 bg-blue-100 rounded-full">
                  <a href="{{ route('menu.tags', $tag->translate('en')->name  )}}">
                    <h2 class="mx-2 my-1 font-bo;d text-gray-900 title-font w-max">
                      {{ $tag->name }}
                    </h2>
                  </a>
                  </div>
                  @endforeach
                </div>
              </div>
            </section>
      
      <section class="text-gray-600 body-font">
        
        <div class="swiper productSwiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($products as $product)
            <div class=" swiper-slide">
              <div class="p-2 mx-auto ">
                <div class="w-full h-56 p-4 overflow-hidden bg-white rounded-lg shadow">
                  <img class="w-24 h-24 mx-auto rounded-full" src="/images/{{$product->image}}" alt="porduct img">
                  <h2 class="mx-auto mt-2 text-sm font-medium text-gray-900 title-font">{{ $product->name }}</h2>
                  <h3 class="mx-auto text-xs font-bold text-indigo-500 title-font">{{ $product->baseflavor->name }}</h3>
                  
                  <div class="overflow-y-auto w-28 md:w-full">
                  @foreach ($product->tags as $tag)
                    <span class="px-1 text-xs font-semibold leading-5 text-gray-800 bg-blue-100 rounded-full">
                        {{ $tag->name}}
                    </span>
                  @endforeach
                </div>
                </div>
                <div class="flex items-center justify-center w-full overflow-hidden">
                  <a class="px-8 mx-auto text-sm font-bold text-white transition duration-300 ease-in-out transform rounded-b-lg shadow-lg md:py-1 md:px-14 lg:mx-0 gradient focus:outline-none focus:shadow-outline hover:scale-105" href="{{ route('menu.item', [$product->id] , true, app()->getLocale()) }}">
                    {{ __('show more') }}
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="swiper-button-prev "></div>
          <div class="swiper-button-next"></div>
        </div>
        
        {{-- @foreach ($types as $type)
        <div class="container px-5 py-5 ">
          <div class="flex flex-wrap p-4 mb-4">
            <div class="w-full mb-6 lg:mb-0">
              <h1 class="mb-2 text-5xl font-medium text-gray-900 sm:text-4xl title-font">{{ $type->name }}</h1>
              <div class="w-20 h-1 bg-indigo-500 rounded"></div>
            </div>
          </div>
          <div class="flex flex-wrap -m-4">
            @foreach($products->where('type_id', $type->id ) as $product)
            <div class="p-2 mx-auto xl:w-1/5 md:w-1/4 sm:w-1/3 ">
              <div class="w-full h-56 p-4 overflow-hidden bg-white rounded-lg shadow">
                <img class="w-24 h-24 mx-auto rounded-full" src="/images/{{$product->image}}" alt="">
                <h2 class="mx-auto mt-2 text-sm font-medium text-gray-900 title-font">{{ $product->name }}</h2>
                <h3 class="mx-auto text-xs font-bold text-indigo-500 title-font">{{ $product->baseflavor->name }}</h3>
                
                <div class="overflow-y-auto w-28 md:w-full">
                @foreach ($product->tags as $tag)
                  <span class="px-1 text-xs font-semibold leading-5 text-gray-800 bg-blue-100 rounded-full">
                      {{ $tag->name}}
                  </span>
                @endforeach
              </div>
              </div>
              <div class="flex items-center justify-center w-full overflow-hidden">
                <a class="px-8 mx-auto text-sm font-bold text-white transition duration-300 ease-in-out transform rounded-b-lg shadow-lg md:py-1 md:px-14 lg:mx-0 gradient focus:outline-none focus:shadow-outline hover:scale-105" href="{{ route('menu.item', $product->id) }}">
                  show more
                </a>
              </div>
            </div>
          @endforeach
        </div>
        </div>
        @endforeach --}}
      </section>
      <section>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


      </section>
    </body>
    <script>
      var swiper = new Swiper(".productSwiper", {
        slidesPerView: 1,
        spaceBetween: 3,
        slidesPerGroup: 2,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          "@0.00": {
            slidesPerView: 2,
            spaceBetween: 10,
          },
          "@0.75": {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          "@1.00": {
            slidesPerView: 3,
            spaceBetween: 40,
          },
          "@1.50": {
            slidesPerView: 4,
            spaceBetween: 50,
          },
        },
      });
    </script>

</html>
@endsection