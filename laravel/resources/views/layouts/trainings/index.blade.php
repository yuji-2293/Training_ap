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
                <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="胸">
                 胸
                </div>            
                <div class="arrow text-rose-500">
                →
                </div> 
            
   

            
            <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="背中">背中</div>
            <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="足">足</div>
            <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="腕or肩">腕or肩</div>
            <div class="category p-2 rounded-md border border border-slate-300 md:hover:bg-sky-300 bg-rose-500 text-white  hover:bg-sky-300" data-category="その他">その他</div>
        </div>

        <div class="mt-6">
            <label class="text-sm font-bold">
                <input class="text-rose-500 focus:border-rose-500 focus:ring-pink-500" type="checkbox" id="deleteModeCheckbox">
                削除
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


<button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
Toggle modal
</button>
<div id="modal-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50"></div>

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-8 w-full max-w-md max-h-full mt-24">
        <div class="relative bg-slate-200 rounded-lg shadow dark:bg-gray-700">
            <!-- 閉じるボタン -->
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
            <!-- モーダルの中身 -->
            <div class="p-4 md:p-5 text-center">
                <button id="activeDeleteMode" type="button" class="text-white bg-rose-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                 登録削除モード
                </button>
                <button id="cancelModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                 キャンセル
                </button>
            </div>
        </div>
    </div>
</div>


</x-trainings.app> 