<!DOCTYPE html>
<html lang="en">
    <head>
    
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title> Gunda </title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Georgian:wght@300&display=swap" rel="stylesheet">
        
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" ></script>
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <style> .gradient{background: linear-gradient(90deg, #339ad5 0%, #5176da 100%);} 
          .swiper {
            max-width: auto;
            max-height: full;
          }
        </style>
    </head>

<body class="bg-gray-200" > 
 
<header>

       <!--Nav-->
    <nav id="header" class="fixed top-0 z-30 w-full text-white gradient">
        <div class="container flex flex-wrap items-center justify-between w-full py-2 mx-auto mt-0">
          <div class="flex items-center pl-4">
            <a  class="text-2xl font-bold text-white no-underline toggleColour hover:no-underline lg:text-4xl" href="">
              {{ __('Gunda') }}
            </a>
          </div>
          {{-- burger --}}
          <div  class="block pr-4 lg:hidden">
            <button id="nav-toggle"  class="flex items-center p-1 text-white toggleColour hover:text-gray-700 focus:outline-none focus:shadow-outline hover:scale-105">
              <svg  class="w-6 h-6 fill-current" viewBox="0 0 20 20" >
                <title>{{ __('Menu') }}</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
              </svg>
            </button>
          </div>

          <div class="z-20 flex-grow hidden w-full p-4 mt-2 text-black lg:flex lg:items-center lg:w-auto lg:mt-0 lg:bg-transparent lg:p-0 " id="nav-content">
            <ul  class="items-center justify-end flex-1 list-reset lg:flex">
              <li  class="mr-3">
                <a class="inline-block px-4 py-2 font-medium text-white no-underline toggleColour hover:text-gray-800" href="{{ route("home") }}">{{ __('Home') }}</a>
              </li>
              <li class="mr-3">
                <a class="inline-block px-4 py-2 font-medium text-white no-underline toggleColour hover:text-gray-800" href="{{ route("menu") }}">{{ __('Menu') }}</a>
              </li>
              <li class="mr-3">
                <a class="inline-block px-4 py-2 font-medium text-white no-underline toggleColour hover:text-gray-800" href="{{ route("about") }}">{{ __('About us') }}</a>
              </li>
              <li class="mr-3">
                <a class="inline-block px-4 py-2 font-medium text-white no-underline toggleColour hover:text-gray-800" href="{{ route("contact") }}">{{ __('Contact') }}</a>
              </li>
              @if(count(config('app.languages')) > 1)
                            <li class="mr-3 ">
                                <div @click.away="open = false" class="relative " x-data="{ open: false }">
                                  <button @click="open = !open" class="inline-block px-4 py-2 font-medium text-white no-underline toggleColour hover:text-gray-800">
                                      {{ strtoupper(app()->getLocale()) }}
                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                  </button>
                                  <div id="trans-toggle" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg lg:w-24 gradient ">
                                    <div class="px-2 py-2 rounded-md shadow ">
                                      @foreach(config('localized-routes.supported-locales') as $langLocale => $langName)
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg toggleColour focus:text-gray-800 hover:shadow focus:bg-gray-200 " 
                                    @isset($id) href="{{route(request()->route()->getName(),[$id], true, $langName) }}" @endisset href="{{route(request()->route()->getName(),[], true, $langName) }}">
                                      {{ strtoupper($langName) }}</a>
                                    @endforeach
                                  </div>
                                  </div>
                                </div>
                              </li>
                        @endif
                        
              <li class="flex border-l-2 toggleColour">
                <a class="text-white toggleColour">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                  </svg>
                </a>
              
                <a class="text-white toggleColour">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                  </svg>
                </a>
              
                <a class="text-white toggleColour">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                  </svg>
                </a>
              </li>
                
            </ul>
          </div>
        </div>
       
      </nav>
</header>


{{-- content  --}}
  @yield('content')




  <!--Footer-->
  <footer class="bg-white">
    <div class="container px-8 mx-auto">
      <div class="flex flex-col justify-center w-full py-6 md:flex-row">
        
        <div class="flex-1">
          <p class="text-gray-500 uppercase md:mb-6">Legal</p>
          <ul class="mb-6 list-reset">
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">Terms</a>
            </li>
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">Privacy</a>
            </li>
          </ul>
        </div>
        <div class="flex-1">
          <p class="text-gray-500 uppercase md:mb-6">Social</p>
          <ul class="mb-6 list-reset">
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">Facebook</a>
            </li>
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">Instagram</a>
            </li>
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">Twitter</a>
            </li>
          </ul>
        </div>
        <div class="flex-1">
          <p class="text-gray-500 uppercase md:mb-6">Company</p>
          <ul class="mb-6 list-reset">
            
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">About Us</a>
            </li>
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </footer>




<script>
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
   
    var brandname = document.getElementById("brandname");
    var toToggle = document.querySelectorAll(".toggleColour");
    var navtoggle = document.getElementById("nav-toggle");
    var transtoggle = document.getElementById("trans-toggle");
    document.addEventListener("scroll", function () {
      /*Apply classes for slide in bar*/
      scrollpos = window.scrollY;

      if (scrollpos > 10) {
        header.classList.add("bg-white");
        header.classList.remove("gradient");
        transtoggle.classList.add("bg-white");
        transtoggle.classList.remove("gradient");
        navtoggle.classList.add("text-white");
        
        
        for (var i = 0; i < toToggle.length; i++) {
          toToggle[i].classList.add("text-gray-800");
          toToggle[i].classList.remove("text-white");
        }
        header.classList.add("shadow");
        
      } else {
        header.classList.remove("bg-white");
        header.classList.add("gradient");
        transtoggle.classList.remove("bg-white");
        transtoggle.classList.add("gradient");
        
        for (var i = 0; i < toToggle.length; i++) {
          toToggle[i].classList.add("text-white");
          toToggle[i].classList.remove("text-gray-800");
        }

        header.classList.remove("shadow");
       
      }
    });
  </script>
  <script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;
    function check(e) {
      var target = (e && e.target) || (event && event.srcElement);

      //Nav Menu
      if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
          // click on the link
          if (navMenuDiv.classList.contains("hidden")) {
            navMenuDiv.classList.remove("hidden");
            
          } else {
            navMenuDiv.classList.add("hidden");
            
          }
        } else {
          // click both outside link and outside menu, hide menu
          navMenuDiv.classList.add("hidden");
        }
      }
    }
    function checkParent(t, elm) {
      while (t.parentNode) {
        if (t == elm) {
          return true;
        }
        t = t.parentNode;
      }
      return false;
    }
  </script>
  <script>
    const swiper = new Swiper('.swiper', {
    // // Optional parameters
    // direction: 'hori',
    // loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });
  </script>
<script>
  var imageSwiper = new Swiper(".imageSwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
       delay: 3500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

</body>
</html>
