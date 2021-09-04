<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <meta name="author" >
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
    
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="flex bg-gray-100 font-family-karla">

    <aside class="relative hidden w-64 h-screen shadow-xl bg-sidebar sm:block">
        <div class="p-6">
            <a href="index.html" class="text-3xl font-semibold text-white uppercase hover:text-gray-300">Admin</a>

        </div>
        <nav class="pt-3 text-base font-semibold text-white">
            <a href="{{ route('adminPannel') }}" class="flex items-center py-4 pl-6 text-white hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="{{ route('edithome') }}" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-sticky-note"></i>
                Edit Home Page
            </a>
            <a href="{{ route('editmenu') }}" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-table"></i>
                Edit Menu
            </a>
            <a href="{{ route('editabout') }}" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-align-left"></i>
                Edit About us
            </a>
            <a href="{{ route('editcontact') }}" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-tablet-alt"></i>
                Edit Contact
            </a>
            <a href="calendar.html" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-calendar"></i>
                Calendar
            </a>
        </nav>
    </aside>

    <div class="flex flex-col w-full h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="items-center hidden w-full px-6 py-2 bg-white sm:flex">
            <div class="w-1/2"></div>
            <div  class="relative flex justify-end w-1/2">
                <form action="{{ route('logout') }}" method="post" class="inline p-3">
                    @csrf
                    <button type="submit" class="font-medium ">Logout</button>
                    </form>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full px-6 py-5 bg-sidebar sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-3xl font-semibold text-white uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-3xl text-white focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center py-2 pl-4 text-white active-nav-link nav-item">
                    <i class="mr-3 fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a href="{{ route('edithome') }}" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-sticky-note"></i>
                    Edit Home Page
                </a>
                <a href="{{ route('editmenu') }}" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-table"></i>
                    Edit Menu
                </a>
                <a href="{{ route('editabout') }}" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-align-left"></i>
                    Edit Abou us
                </a>
                <a href="{{ route('editcontact') }}" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-tablet-alt"></i>
                    Edit Contact
                </a>
                <a href="calendar.html" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-calendar"></i>
                    Calendar
                </a>
                <a href="{{ route('logout') }}" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-sign-out-alt"></i>
                    Sign Out
                </a>
            </nav>
        </header>


        @yield('content')

    </body>

</html>

