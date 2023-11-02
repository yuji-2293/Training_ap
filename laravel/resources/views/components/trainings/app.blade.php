<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>管理者ページ</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
        <body class="antialiased flex flex-col min-h-[100vh] font-mono bg-slate-200">
         <header class="bg-sky-600 flex justify-around tracking-widest">
                <div class="text-white text-lg font-bold max-w-7xl mx-auto px-4 sm:px-6">
                            <div class="py-4 text-center">
                                <a href="" class="text-white text-xl font-bold">筋トレ記録管理アプリ</a>
                            </div>    
                    <div class="py-4 w-full flex space-x-20 items-end items-center">
                        <a href="{{('/')}}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 outline-none hover:outline-red-500 hover:rounded-sm">TOP</a>
                        <a href="{{ route('part_create') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 outline-none hover:outline-red-500 hover:rounded-sm">マイトレ</a>
                        <a href="{{ route('trainings.create') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 outline-none hover:outline-red-500 hover:rounded-sm">ワークアウトの記録</a>
                        <a href="{{ route('trainings.Mymenu') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 outline-none hover:outline-red-500 hover:rounded-sm">マイトレの登録</a>

                        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover-2"  data-dropdown-trigger="hover" data-dropdown-delay="1000"
                        class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white flex items-center
                         focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 outline-none hover:outline-red-500 hover:rounded-sm" type="button">{{ Auth::user()->name }}（ユーザー）
                                    <svg class="w-3 h-2.5 ml-2.5 mt-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                        </button>

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

                    </div>
                </div> 

             </header>
{{$slot}}


    <footer class="bg-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4 text-center">
                <p class="text-white text-sm">筋トレ記録管理アプリ</p>
            </div>
        </div>
    </footer>
</body>
</html>