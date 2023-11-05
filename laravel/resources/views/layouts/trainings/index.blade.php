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
    <div id="dashboard" class="w-48 h-48 text-center bg-white shadow">
        <div id="categories" class="border">
            <div class="category border " data-category="胸">胸</div>
            <div class="category border" data-category="背中">背中</div>
            <div class="category border" data-category="足">足</div>
            <div class="category border" data-category="腕/肩">腕/肩</div>
            <div class="category border" data-category="その他">その他</div>
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