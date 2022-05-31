@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="en">



  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', 'Noto Sans Georgian', sans-serif;">    
    
  
    <section>
      <div class="max-h-screen overflow-hidden gradient">
        <div class="imageSwiper">
          <div class=" swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="bg-fixed swiper-slide">
                <img src="/images/{{ $slider->image }}" class=" w-full  img.box z-0" alt="gunda news img" >
            </div>
            @endforeach
          </div>
        </div>
    
      </div>
    </section>
    
  <section class="relative z-20 -mt-20 overflow-visible md:-mt-48">
    {{-- wave --}}
    <div>
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
          {{-- news section --}}
        @if(isset($news))
          <div class="pt-6 bg-white border-b">
            <div class="container z-20 max-w-5xl m-8 mx-auto sm:w-5/6">
                  <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                  {{ __('News') }}
                  </h1>
              <div class="z-20 w-full mb-4">
                <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
              </div>
              <div class="z-20 swiper">
                  <!-- Additional required wrapper -->
                  <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($news as $news)
                      <div class="flex flex-wrap justify-center shadow swiper-slide">
                        <div class="w-full p-6 md:w-1/2">
                          <img src="/images/{{ $news->image }}" alt="gunda news img" class="rounded ">
                        </div>
                      <div class="w-5/6 p-6 text-center md:w-1/2">
                          <h3 class="mb-3 text-3xl font-bold leading-none text-gray-800 ">
                            {{ $news->title }}
                          </h3>
                          <div class="my-4 text-gray-600">
                            {!! $news->text !!}
                          </div>
                          <p class="p-8 text-sm text-right text-gray-400">
                            {{ \Carbon\Carbon::createFromTimestamp(strtotime($news->created_at))->format('d/m/Y')}} 
                          </p>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
              </div>
            </div>
          </div>
        @endif
  </section>
    <section class="py-8 bg-white border-b">
      <div class="container flex flex-wrap pt-4 pb-12 mx-auto">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
         {{ __('Our Menu') }}
        </h1>
        <div class="w-full mb-4">
          <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
        </div>
        <div class="flex flex-col flex-grow flex-shrink w-full h-60 p-2 ">
          <a class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer" href="{{ route("menu") }}">
            <img class="object-contain w-full" src="/images/{{ $sliders[0]->image }}" alt="menu">
            <div class="absolute top-0 left-0 w-full px-6 py-4">
              <h6 class="mb-3 text-xl font-semibold tracking-tight text-white">{{ __("Today's Menu") }}</h4>
            </div>
          </a>
        </div>
        @foreach($categories as $category)
        <div class="flex flex-col flex-grow flex-shrink w-full p-2 md:w-1/3 md:h-96 h-40">
          <a class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer" href="{{ route('menu.category', $category->translate('en')->name  )}}">
            <img class="object-contain" src="/images/{{ $category->image }}" alt="photo abput gunda">
            <div class="absolute top-0 left-0 w-full px-6 py-4">
              <h4 class="mb-3 text-xl font-semibold tracking-tight text-white"> {{ $category->name }}</h4>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </section>
    <section class="py-8 bg-gray-50">
      <div class="container px-2 pt-4 pb-12 mx-auto text-gray-800 ">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          {{ __('New flavors') }}
        </h1>
        <div class="w-full mb-4">
          <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
        </div>
        {{-- list --}}
        <div class="flex flex-col items-center justify-center pt-12 my-12 sm:flex-row sm:my-4">
          
          <div class="flex flex-col w-5/6 mx-auto mt-4 rounded-none bg-gray-50 lg:w-1/4 lg:mx-0 lg:rounded-l-lg">
            <div class="overflow-hidden text-gray-600 bg-white rounded-t rounded-b-none shadow ">
              <div class="p-8 text-3xl font-bold text-center ">
                {{ $newProducts[1]->name }}
              </div>
              <img class="w-auto overflow-hidden" src="/images/{{ $newProducts[1]->image }}" alt="photo abput gunda">
            </div>
            <div class="flex-none p-6 overflow-hidden bg-white rounded-t-none rounded-b shadow">
              <div class="w-full pt-6 text-3xl font-bold text-center text-gray-600">
                ${{ $newProducts[1]->price }}
                <span class="text-base">{{ __('for one thing ') }}</span>
              </div>
              
                <div class="flex items-center justify-center w-full mt-4 overflow-hidden">
                  
                  <a class="p-4 mx-auto font-bold text-white transition duration-300 ease-in-out transform rounded-full md:py-4 md:px-8 lg:mx-0 gradient focus:outline-none focus:shadow-outline hover:scale-105" href="{{ route('menu.item', $newProducts[1]->id, true, app()->getLocale()) }} ">
                    {{ __('show more') }}
                  </a>
                </div>
            </div>
          </div>
 
          <div class="z-10 flex flex-col w-5/6 mx-auto mt-4 bg-white border-2 rounded-lg shadow-lg lg:w-1/3 lg:mx-0 sm:-mt-6">
            <div class="flex-1 overflow-hidden bg-white rounded-t rounded-b-none shadow">
              <div class="w-full p-8 text-3xl font-bold text-center">{{ $newProducts[0]->name }}</div>
              <div class="w-full h-1 py-0 my-0 rounded-t gradient"></div>
              <img class="w-full my-auto" src="/images/{{ $newProducts[0]->image }}" alt="photo abput gunda">
            </div>
            <div class="flex-none p-6 mt-auto overflow-hidden bg-white rounded-t-none rounded-b shadow">
              <div class="w-full pt-6 text-3xl font-bold text-center text-gray-600">
                   ${{ $newProducts[0]->price }}
                <span class="text-base"> {{ _('for one thing') }}</span>
              </div>
              <div class="flex items-center justify-center w-full mt-4 overflow-hidden">
                  
                <a class="p-4 mx-auto font-bold text-white transition duration-300 ease-in-out transform rounded-full md:py-4 md:px-8 lg:mx-0 gradient focus:outline-none focus:shadow-outline hover:scale-105" href="{{ route('menu.item', $newProducts[0]->id) }}">
                  {{ __('show more') }}
                </a>
              </div>
            </div>
          </div>
           
          <div class="flex flex-col w-5/6 mx-auto mt-4 rounded-none bg-gray-50 lg:w-1/4 lg:mx-0 lg:rounded-l-lg">
            <div class="overflow-hidden text-gray-600 bg-white rounded-t rounded-b-none shadow ">
              <div class="p-8 text-3xl font-bold text-center ">
                {{ $newProducts[2]->name }}
              </div>
              <img class="w-auto overflow-hidden" src="/images/{{ $newProducts[2]->image }}" alt="ice cream gunda">
            </div>
            <div class="flex-none p-6 overflow-hidden bg-white rounded-t-none rounded-b shadow">
              <div class="w-full pt-6 text-3xl font-bold text-center text-gray-600">
                ${{ $newProducts[2]->price }}
                <span class="text-base">{{ _('') }} for one thing</span>
              </div>
                <div class="flex items-center justify-center w-full mt-4 overflow-hidden">
                  <a class="p-4 mx-auto font-bold text-white transition duration-300 ease-in-out transform rounded-full md:py-4 md:px-8 lg:mx-0 gradient focus:outline-none focus:shadow-outline hover:scale-105" href="{{ route('menu.item', $newProducts[2]->id) }}">
                    {{ __('show more') }}
                  </a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
          <g class="wave" fill="#f8fafc">
            <path
              d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
            ></path>
          </g>
          <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
            <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
              <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
              <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"
              ></path>
              <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
            </g>
          </g>
        </g>
      </g>
    </svg>
    <section class="py-8 border-b">
        
      <div class="container max-w-5xl m-8 mx-auto">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
              {{ $contact->title }}
            </h1>
        <div class="w-full mb-4">
          <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
        </div>
        <div class="flex flex-wrap">
          <div class="w-5/6 p-6 sm:w-1/2">
            <p class="mb-8 text-gray-600">{!! $contact->text !!}</p>
          </div>
          <div class="w-full p-6 sm:w-1/2">
            <p class="mb-8 text-gray-600">{{ __('Where to find:') }}</p>
            <iframe class="mx-auto rounded-lg " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2978.675218865062!2d44.787903!3d41.705946499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440d8e817f28bf%3A0xd5ab8cdb2bb5abad!2sGunda%20bar!5e0!3m2!1sen!2sge!4v1631790829913!5m2!1sen!2sge"  allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
      
    </section>
    
  </body>
  
</html>
@endsection