    
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

