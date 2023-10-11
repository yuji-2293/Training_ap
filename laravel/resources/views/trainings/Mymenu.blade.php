<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>マイメニュー</title>
    @vite('resources/css/app.css')
     @vite('resources/js/app.js')
</head>
<body class="flex flex-col min-h-[100vh] font-mono bg-slate-200">
        <header class="bg-sky-600 ">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 flex relative">
                    <div class="py-4">
                        <a href="{{route('trainings.index')}}" class="text-white text-xl font-bold">>TOPへ戻る</a>
                        @method('get')
                    </div>
                    <div class="py-4 flex absolute inset-y-0 right-5">
                        <a href="{{ route('trainings.create') }}" class="text-white text-xl font-bold">トレーニングを記録する</a>
                        @method('get')
                    </div>
                </div>
        </header>
        <main class="grow">










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