<!DOCTYPE html>
<html lang="en">
    <head>
    
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>
          Gunda
        </title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <!--Replace with your tailwind.css once created-->
        {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" /> --}}
        <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
        <style>
          .gradient {
            background: linear-gradient(90deg, #339ad5 0%, #5176da 100%);
          }
        </style>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    </head>

<body class="bg-gray-200" > 

<header>

       <!--Nav-->
    <nav id="header" class="fixed top-0 z-30 w-full text-white">
        <div class="container flex flex-wrap items-center justify-between w-full py-2 mx-auto mt-0">
          <div class="flex items-center pl-4">
            <a  class="text-2xl font-bold text-white no-underline transition duration-300 toggleColour hover:no-underline lg:text-4xl" href="">
              Gunda
            </a>
          </div>
          {{-- burger --}}
          <div  class="block pr-4 lg:hidden">
            <button id="nav-toggle"  class="flex items-center p-1 text-blue-500 transition duration-300 ease-in-out transform hover:text-gray-900 focus:outline-none focus:shadow-outline hover:scale-105">
              <svg  class="w-6 h-6 fill-current" viewBox="0 0 20 20" >
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
              </svg>
            </button>
          </div>

          <div class="z-20 flex-grow hidden w-full p-4 mt-2 text-black bg-white lg:flex lg:items-center lg:w-auto lg:mt-0 lg:bg-transparent lg:p-0" id="nav-content">
            <ul  class="items-center justify-end flex-1 list-reset lg:flex">
              <li  class="mr-3">
                <a class="inline-block px-4 py-2 font-medium text-black no-underline hover:text-gray-800" href="{{ route("home") }}">Home</a>
              </li>
              <li class="mr-3">
                <a class="inline-block px-4 py-2 font-medium text-black no-underline hover:text-gray-800" href="{{ route("contact") }}">Contact</a>
              </li>
              <li class="mr-3">
                <a class="inline-block px-4 py-2 font-medium text-black no-underline hover:text-gray-800" href="{{ route("about") }}">About us</a>
              </li>
              <li class="mr-3">
                <a class="inline-block px-4 py-2 font-medium text-black no-underline hover:text-gray-800" href="{{ route("menu") }}">Menu</a>
              </li>
            </ul>
            <button 
              
              
              >
           
            </button>
          </div>
        </div>
        <hr id="navAction" class="py-0 my-0 border-b border-gray-100 opacity-25" />
      </nav>
</header>


{{-- content  --}}
  @yield('content')




  <!--Footer-->
  <footer class="bg-white">
    <div class="container px-8 mx-auto">
      <div class="flex flex-col w-full py-6 md:flex-row">
        
        <div class="flex-1">
          <p class="text-gray-500 uppercase md:mb-6">Links</p>
          <ul class="mb-6 list-reset">
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">FAQ</a>
            </li>
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">Help</a>
            </li>
            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
              <a href="#" class="text-gray-800 no-underline hover:underline hover:text-pink-500">Support</a>
            </li>
          </ul>
        </div>
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
    <a href="https://www.freepik.com/free-photos-vectors/background" class="text-gray-500">Background vector created by freepik - www.freepik.com</a>
  </footer>




<script>
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var navcontent = document.getElementById("nav-content");
    var navaction = document.getElementById("navAction");
    var brandname = document.getElementById("brandname");
    var toToggle = document.querySelectorAll(".toggleColour");

    document.addEventListener("scroll", function () {
      /*Apply classes for slide in bar*/
      scrollpos = window.scrollY;

      if (scrollpos > 10) {
        header.classList.add("bg-white");
        navaction.classList.remove("bg-white");
        navaction.classList.add("gradient");
        navaction.classList.remove("text-gray-800");
        navaction.classList.add("text-white");
        //Use to switch toggleColour colours
        for (var i = 0; i < toToggle.length; i++) {
          toToggle[i].classList.add("text-gray-800");
          toToggle[i].classList.remove("text-white");
        }
        header.classList.add("shadow");
        navcontent.classList.remove("bg-gray-100");
        navcontent.classList.add("bg-white");
      } else {
        header.classList.remove("bg-white");
        navaction.classList.remove("gradient");
        navaction.classList.add("bg-white");
        navaction.classList.remove("text-white");
        navaction.classList.add("text-gray-800");
        //Use to switch toggleColour colours
        for (var i = 0; i < toToggle.length; i++) {
          toToggle[i].classList.add("text-white");
          toToggle[i].classList.remove("text-gray-800");
        }

        header.classList.remove("shadow");
        navcontent.classList.remove("bg-white");
        navcontent.classList.add("bg-gray-100");
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
</body>
</html>
