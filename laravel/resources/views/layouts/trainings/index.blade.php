<x-trainings.app>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- calendarのスタイルを読み込み -->
 <link rel="stylesheet" href="/css/style.css" >
<!-- calendarファイルを読み込み -->
 @vite('resources/js/calendar.js')
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<div class="flex">
    <!-- dashboard -->
    <div id="dashboard" class="w-1/12 h-80  bg-white text-center m-8 rounded-md shadow">
        <div id="categories" class="shadow w-2/3 bg-sky-100 mx-auto m-2 mt-4 rounded-md" >
            <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="胸">胸</div>
            <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="背中">背中</div>
            <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="足">足</div>
            <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="腕or肩">腕or肩</div>
            <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="その他">その他</div>
        </div>
        <div class="mt-6">
            <label class="text-sm font-bold">
                <input class="text-rose-500 focus:border-rose-500 focus:ring-pink-500" type="checkbox" id="deleteModeCheckbox">
                remove mode
            </label>
        </div>

    </div>
<!-- calendarをブラウザに表示 -->
    <div id="app">
        <div class="m-auto m-7 p-7 max-w-7xl">
            <div id='calendar' class="bg-white p-7 rounded-lg shadow"></div>
        </div>
    </div>
</div>

</x-trainings.app> 