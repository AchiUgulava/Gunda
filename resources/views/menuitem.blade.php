@extends('layouts.app')

@section('content')
<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', 'Noto Sans Georgian', sans-serif;">

<div class="pt-12 pb-32 gradient">
    <div class="flex flex-col items-center justify-center bg-teal-100 ">
  
        <div 
          class="relative w-full mx-auto"
          x-data="{ activeSlide: 1, slides: [1, 2, 3, 4, 5] }"
         >
          <!-- Slides -->
          <template x-for="slide in slides" :key="slide">
            <div
               x-show="activeSlide === slide"
               class="flex items-center h-64 p-24 text-5xl font-bold text-white bg-teal-500 rounded-lg ">
              <span class="w-12 text-center" x-text="slide"></span>
              <span class="text-teal-300">/</span>
              <span class="w-12 text-center" x-text="slides.length"></span>
            </div>
          </template>
          
          <!-- Prev/Next Arrows -->
          <div class="absolute inset-0 flex">
            <div class="flex items-center justify-start w-1/2 lg:-mr-8">
              <button 
                class="w-12 h-12 font-bold text-teal-500 bg-teal-100 rounded-full hover:text-orange-500 hover:shadow-lg"
                x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1">
                &#8592;
               </button>
            </div>
            <div class="flex items-center justify-end w-1/2 ">
              <button 
                class="w-12 h-12 font-bold text-teal-500 bg-teal-100 rounded-full hover:text-orange-500 hover:shadow"
                x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1">
                &#8594;
              </button>
            </div>        
          </div>
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
   <section class="overflow-hidden text-gray-700 bg-white body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap mx-auto lg:w-4/5">
        {{-- image --}}
        <img alt="Gunda icecream" class="object-cover object-center w-full border border-gray-200 rounded shadow lg:w-1/2" src="/images/{{$product->image}}">
        <div class="w-full mt-6 shadow lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
          {{-- name and flavors  --}}
          <h2 class="text-sm tracking-widest text-gray-500 title-font">{{ $product->baseflavor->name }} {{ $product->type->name }}</h2>
          <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font">{{ $product->name }}</h1>
          <div class="flex mb-4">
            
            
          </div>
          <div class="rounded ">
            <p class="p-2 leading-relaxed">{{ $product ->description }}</p>
          </div>
          
          <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-200">
            <div class="flex">
              @foreach ($product->tags as $tag)
              <h3 class="px-2 pb-1 mx-1 text-sm font-semibold leading-5 text-gray-800 bg-blue-100 rounded-full">
                {{ $tag->name }}
              </h3>
              
              @endforeach
              </div>
              {{-- expand choices thing --}}
              
            {{-- <div class="flex items-center ml-6">
              <span class="mr-3">Size</span>
              <div class="relative">
                <select class="py-2 pl-3 pr-10 text-base border border-gray-400 rounded appearance-none focus:outline-none focus:border-red-500">
                  <option>SM</option>
                  <option>M</option>
                  <option>L</option>
                  <option>XL</option>
                </select>
                <span class="absolute top-0 right-0 flex items-center justify-center w-10 h-full text-center text-gray-600 pointer-events-none">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"></path>
                  </svg>
                </span>
              </div>
            </div> --}}
          </div>
          <div class="flex">
            <span class="p-2 text-2xl font-medium text-gray-900 title-font">$ {{ $product->price }}</span>
            <button class="flex px-6 py-2 ml-auto text-white border-0 rounded gradient focus:outline-none hover:scale-105">Button</button>
            <button class="inline-flex items-center justify-center w-10 h-10 p-0 ml-4 text-gray-500 bg-gray-200 border-0 rounded-full">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 p-1" viewBox="0 0 24 24">
                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  
    </body>

</html>


@endsection