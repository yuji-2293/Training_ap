
 //カレンダー機能処理//
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var dashboardEl = document.getElementById('dashboard');
        var Draggable = FullCalendar.Draggable;


        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          height:'auto',
                    firstDay:1,
                    headerToolbar: {
                        left: "",
                        center: "title",
                        right: "prev,next today",
                    },
                    buttonText:{
                    ToDay:'今月',
                    month:'今月',
                    },
                    locale:'ja',
                    noEventsContent: 'スケジュールはありません',

                    // イベントドラッグ＆ドロップの設定
                    editable: true,
                    eventDurationEditable:true,
                    eventStartEditable:true,
                    droppable:true,

                    eventReceive:function(info){

                      var start = info.event.start.toISOString().slice(0,19).replace("T"," ");
                      var eventData = {
                      title: info.event.title,
                      start: start,
                      category: info.event.extendedProps.category
                      };

                      var csrfToken = 
                      document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                      $.ajax({
                      url:  '/event/',
                      type: 'post',
                      data:eventData,
                      headers: {
                        'X-CSRF-TOKEN' : csrfToken
                      },
                      success:function(response) {
                      console.log(response);
                      },
                      error: function(error){
                      console.log(error);
                      console.log(info.event.title);
                      console.log(info.event.start);
                      console.log(info.event.extendedProps.category);
                      }
                      })
                    },
 
                    

                    eventChange:function(info){
                    var category = info.event.extendedProps.category;
                    var start = info.event.start;
                    var end = info.event.end;
                    },
                    selectable: true,
                    eventDisplay:'auto',
                 
                    aspectRatio: 1.1,   // 月表示の際に各日付枠のhightの変更
                    navLinks: true,     // 月表示で日付を押すと日付表示へ遷移する
                    slotEventOverlap: false,    // 週や日表示で同一時間帯のイベントがある場合、イベントが重なって表示されなくなる
                    dayMaxEvents: true,
                    dayMaxEvents: 3,
                    allDaySlot: true,   // 週や日表示で終日が表示される
                    timeZone: "asia/Tokyo",
                    //DB連携=JSONページの読み込み//
                    events:'/calendar',
                    //表示しているイベントの内容をtitleだけにする
                    eventContent: function(arg){
                      return {
                      html:'<b>' + arg.event.title + '</b>'
                      };
                    },
               
                    });
                    calendar.render();
                    
                    const deleteModeCheckbox = document.getElementById('deleteModeCheckbox');
                    let isDeleteMode = false;
                    deleteModeCheckbox.addEventListener('change',function(){
                    isDeleteMode = deleteModeCheckbox.checked;
                    });
                    const partUrls = {
                    胸:'/my-menu/chest',
                    背中:'/my-menu/back',
                    足:'/my-menu/legs',
                    腕or肩:'/my-menu/arms_shoulders',
                    その他:'/my-menu/other',
                    };

                      calendar.on('eventClick', function(info) {
                       if(isDeleteMode) {
                         if(confirm('このイベントを本当に削除しますか？')) {
                           var eventId = info.event.id;
                            $.ajax({
                            url: '/calendar/' + eventId,
                            type:'GET',
                            success: function(response) {
                              info.event.remove();
                              console.log(response.message);
                            },
                            error:function(error) {
                            console.error(error);
                            }  
                          });
                        }
                      } else {
                        const part = info.event.extendedProps.category;
                        if (partUrls[part]) {
                         window.location.href = partUrls[part];
                        } else {
                         console.error('部位に対するURLが未定義です。');
                         console.error(info.event.extendedProps.category);
                        }
                      };
                    });
                    // カテゴリー要素をドラック操作できる処理
                    new FullCalendar.Draggable(dashboardEl,{
                    itemSelector:'.category',
                    eventData: function(eventEl){
                    var category =
                    eventEl.getAttribute('data-category');
                    return {
                    title:category,
                    category:category,
                    };
                    }
                    });
                  });
                  const eventDidMount = (args) => {
    let parent = $(args.el).parent()
    if (parent.css('z-index')!=='auto'){ // allDayイベントでなければz-indexはautoとなる
        let insets = parent.attr('style').split('inset: ').slice(-1)[0].replace(';', '').split(' ')
        insets[1] = '0%'
        // parent.css({'inset': insets.join(' ')})
        parent.css({top: insets[0], right: insets[1], bottom: insets[2], left: insets[3]})
    }
}
