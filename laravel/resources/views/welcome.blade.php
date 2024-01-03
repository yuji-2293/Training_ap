<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>welcomeページ</title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased flex flex-col min-h-[100vh] font-mono bg-slate-200">
         <header class="bg-sky-600 flex justify-around">
                <div class="text-white text-white text-xl font-bold max-w-7xl mx-auto px-4 sm:px-6 ">
                            <div class="py-4 text-center">
                                <p href="" class="text-white text-xl font-bold">トレログ</p>
                            </div>    
                    <div class="py-4 flex space-x-36">
                        <a href="{{'/'}}" class="text-xl font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">TOP</a>


                         <form method="POST" action="{{ url('/guest-login') }}">
                            @csrf
                            <button class=text-xl font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500
                             type="submit">ゲストログイン
                            </button>
                        </form> 

                    <!-- Dropdown menu -->
                    <div id="dropdownHover-2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                            <x-dropdown-link :href="route('profile.edit')" class="">
                            {{ __('Profile') }}
                            </x-dropdown-link>
                        </li>
                            <li>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                            </form>
                            </li>
                        </ul>
                    </div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-xl font-bold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">WorkOuts!!</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ログイン</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ユーザー登録</a>
                            @endif
                        @endauth
                    @endif
                    </div>
                </div> 
             </header>
             
<main class="m-10 grow">


    <div id="default-carousel" class="relative max-w-5xl w-full mx-auto shadow-lg rounded-md" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96 z-0">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <div class="absolute w-full h-full flex items-center justify-center">
                <img src="/images/images- (1).jpg" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <span class="text-white text-4xl font-bold z-10">トレログへようこそ</span>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <div class="absolute w-full h-full flex items-center justify-center">
                <img src="/images/images- (2).jpg" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <span class="text-white text-4xl font-bold z-10">トレログへようこそ</span>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <div class="absolute w-full h-full flex items-center justify-center">
                <img src="/images/images- (3).jpg" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <span class="text-white text-4xl font-bold z-10">トレログへようこそ</span>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <div class="absolute w-full h-full flex items-center justify-center">
                <img src="/images/images- (4).jpg" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <span class="text-white text-4xl font-bold z-10">トレログへようこそ</span>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <div class="absolute w-full h-full flex items-center justify-center">
                <img src="/images/images- (5).jpg" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <span class="text-white text-4xl font-bold z-10">トレログへようこそ</span>
                </div>
            </div>

        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</main>
<footer class="bg-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4 text-center">
                <p class="text-white text-sm">筋トレ記録管理アプリ</p>
            </div>
        </div>
    </footer>
</body>

</html>
