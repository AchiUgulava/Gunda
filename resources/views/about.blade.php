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
   {{-- about --}}
  <section class="py-8 bg-white border-b">
  <div class="container max-w-5xl m-8 mx-auto">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          {{ $text->title }}
        </h1>
    <div class="w-full mb-4">
      <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
    </div>
    <div class="flex flex-wrap">
      <div class="w-5/6 p-6 sm:w-1/2">
        <p class="mb-8 text-gray-600">{!! $text->text !!}</p>
      </div>
      <div class="w-full p-6 sm:w-1/2">
        <img class="mx-auto rounded-lg " src="/images/1631790432.jpg" alt="photo abput gunda">
        
      </div>
    </div>
  </div>
</section>
    </body>

</html>


@endsection