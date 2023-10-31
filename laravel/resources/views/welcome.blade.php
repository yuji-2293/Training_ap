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
                                <a href="" class="text-white text-xl font-bold">筋トレ記録管理アプリ</a>
                            </div>    
                    <div class="py-4 flex space-x-36">
                        <a href="{{('/')}}" class="text-xl font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">TOP</a>
                        <a href="" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Howto~使い方</a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">管理画面</a>
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

             <main class="grid justify-items-center">


<a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row
 md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 m-7">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/docs/images/blog/image-4.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal text-center">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">welcomeエリア</h5>
        <p class="mb-3 mt-3 font-normal text-gray-700 dark:text-gray-400">ここにtop画像を配置するここにtop画像を配置するここにtop画像を配置するここにtop画像を配置するここにtop画像を配置する</p>
        <p class="mb-3 mt-3 font-normal text-gray-700 dark:text-gray-400">ここにtop画像を配置するここにtop画像を配置するここにtop画像を配置するここにtop画像を配置するここにtop画像を配置する</p>
        <p class="mb-3 mt-3 font-normal text-gray-700 dark:text-gray-400">ここにtop画像を配置するここにtop画像を配置するここにtop画像を配置するここにtop画像を配置するここにtop画像を配置する</p>
    </div>
</a>


             </main>

        </body>
</html>
