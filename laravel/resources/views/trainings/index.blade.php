
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css" >
    <title>training_ap</title>
    <!-- vite読み込み -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
   <!-- カレンダーCDN読み込み -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <!-- jquery CDN読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 </head>
 
 <!-- javascript -->
<script>
    
 //カレンダー機能処理//
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',

          height:'auto',
                    firstDay:1,
                    headerToolbar: {
                        left: "dayGridMonth listMonth",
                        center: "title",
                        right: "prev,next today",
                    },
                    buttonText:{
                    today:'今月',
                    month:'月',
                    list:'リスト'
                    },
                    locale:'ja',
                    noEventsContent: 'スケジュールはありません',
                    editable: true,
                    selectable: true,
                    eventDisplay:'auto',
                 
                    aspectRatio: 1.1,   // 月表示の際に各日付枠のhightの変更
                    navLinks: true,     // 月表示で日付を押すと日付表示へ遷移する
                    slotEventOverlap: false,    // 週や日表示で同一時間帯のイベントがある場合、イベントが重なって表示されなくなる
                    dayMaxEvents: true,
                    dayMaxEvents: 3,
                    allDaySlot: true,   // 週や日表示で終日が表示される
                    timeZone: "Asia/Tokyo",



                    select: function (info) {
                        document.location.href="/trainings/create";  //日付をクリックしたら/createに遷移
                        alert("トレーニング内容の登録ページに遷移します");
                    },
                    //DB連携=JSONページの読み込み//
                    events:'http://localhost:8000/Json/',
                    // モーダル表示処理
                    eventClick: function(jsEvent){
                        window.location.href = '/events/' + jsEvent.event.id;
                    },                 
                    });
                    calendar.render();
                    });

</script>

<!-- HTML -->
<body class="flex flex-col min-h-[100vh] font-mono bg-slate-200">
<header class="bg-sky-600">
<div class="max-w-7xl mx-auto px-4 sm:px-6 flex relative">    
             <div class="py-4">
                <a href="{{route('trainings.index')}}" class="text-white text-xl font-bold">筋トレ記録管理アプリ</a>
             </div>
    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white text-xl font-bold py-4 flex absolute inset-y-0 right-5 hover:bg-sky-400 
              rounded-lg text-center inline-flex items-center " type="button">メニューを表示（仮）
            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
   </button>
</div> 
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                <a href="{{ route('trainings.Mymenu') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">マイメニューの登録</a>
                </li>
                <li>       
                    <a href="{{ route('trainings.Mymenu') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">マイメニューの確認</a>
                </li>
                <li>
                    <a href="{{ route('trainings.create') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">ワークアウトの登録</a>
                </li>
                </ul>
            </div>

                <!--<div class="py-4 flex absolute inset-y-0 right-5">
                    <a href="{{ route('trainings.create') }}" class="text-white text-xl font-bold">トレーニングの登録/</a>
                    <a href="{{ route('trainings.Mymenu') }}" class="text-white text-xl font-bold">マイメニューの登録</a>
                    @method('get')
                </div>
                <div class="py-4 flex ml-auto mr-auto">
                <p class="text-white text-xl font-bold">マイメニューを確認する</p>
            </div>-->

    </header>

<!-- calendar.jsを読み込む -->
    <div id="app">
        <div class="m-auto w-50 m-7 p-7">
            <div id='calendar' class="bg-white p-7"></div>
        </div>
    </div>
    <footer class="bg-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4 text-center">
                <p class="text-white text-sm">筋トレ記録管理アプリ</p>
            </div>
        </div>
</footer>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>

</body>
</html>