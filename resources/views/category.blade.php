@extends('layouts.app')

@section('content')

<!DOCTYPE html>

<html lang="en">
    

    <body class="leading-normal tracking-normal text-white gradient" style=" font-family: 'Source Sans Pro', 'Noto Sans Georgian', sans-serif;">
      
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
          <section class="relative z-20 -mt-20 overflow-visible md:-mt-48 ">
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
            {{-- menu --}}
            <div class="pt-8 bg-white border-b">
              <div class="container flex flex-wrap pt-4 pb-12 mx-auto">
                {{-- category name --}}
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                  {{ $category->name }}
                </h1>
                <div class="w-full mb-4">
                  <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient">
                  </div>
                </div>
                {{-- category description --}}
                @if (!empty($category->description))
                      <div class="justify-center w-full px-6 text-xl font-bold text-center text-gray-800">
                        <h2 class="px-6 mb-5 text-base text-gray-800">
                          {!! $category->description !!} 
                        </h2>
                      </div>
                @endif
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
            </div>
            </section>
            <section class="text-gray-600 body-font">
         
              @foreach ($types as $type)
              <div class="py-4 bg-white ">
                <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800"> {{ $type->name }}</h2>
                  <div class="w-full mb-4">
                    <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
                  </div>
                  <div class="flex items-center justify-center">
                    <a class="px-8 py-1 mx-auto mb-6 font-bold text-white transition duration-300 ease-in-out transform rounded-full shadow-lg lg:mx-0 hover:underline gradient focus:outline-none focus:shadow-outline hover:scale-105" href="{{ route('menu.category', $category->translate('en')->name  )}}">{{ __('show all') }}</a>
                  </div>
                </div>
              <section class="text-gray-600 bg-white border-b body-font">
                <div class="swiper productSwiper">
                  <!-- Additional required wrapper -->
                  <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($products->where('type_id', $type->id ) as $product)
                     <div class=" swiper-slide">
                      <div class="p-2 mx-auto">
                          <a x-data="{}" x-on:click="window.livewire.emitTo('menu-modal', 'show',{{ $product->id }})" class="cursor-pointer">
                            <div class="h-auto overflow-hidden bg-white rounded-lg shadow-xl border ">
                              <img alt="Placeholder" class="w-auto mx-auto overflow-hidden rounded-t-lg h-3/4" src="/images/{{$product->image}}">
                              
                              <h2 class="mx-auto my-2 text-xl font-bold text-center text-gray-900 title-font">{{ $product->name }}</h2>
                              
                              <a class="rounded-b-xl " href="{{ route('menu.item', [$product->id] , true, app()->getLocale()) }}">
                                <h2 class="py-1 mx-auto text-sm font-light text-center text-white title-font gradient ">
                                {{ __('show more') }}
                                </h2>
                              </a>
                            </div>
                        </a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="swiper-button-prev "></div>
                  <div class="swiper-button-next"></div>
                   <div class="swiper-pagination"></div> 
                </div> 
              </section>
            </section>
            @endforeach
          <livewire:scripts />
          <livewire:menu-modal/>
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