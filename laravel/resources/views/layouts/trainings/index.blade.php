<x-trainings.app>
<!-- calendarのスタイルを読み込み -->
 <link rel="stylesheet" href="/css/style.css" >
<!-- calendarファイルを読み込み -->
 @vite('resources/js/calendar.js')
 <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

<!-- calendarをブラウザに表示 -->
    <div id="app">
        <div class="m-auto w-50 m-7 p-7">
            <div id='calendar' class="bg-white p-7"></div>
        </div>
    </div>
</x-trainings.app> 