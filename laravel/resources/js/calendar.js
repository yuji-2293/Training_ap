
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
                      url:  '/event',
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
                    events:'https://kukku999.xsrv.jp/calendar',
                    //表示しているイベントの内容をtitleだけにする
                    eventContent: function(arg){
                      return {
                      html:'<b>' + arg.event.title + '</b>'
                      };
                    },
               
                    });
                    calendar.render();
    let isDeleteMode = false;
    const deleteModeCheckbox = document.getElementById('deleteModeCheckbox');
    const popupModal = document.getElementById('popup-modal');
    const modalOverlay = document.getElementById('modal-overlay');
    const activeDeleteModeButton = document.getElementById('activeDeleteMode');
    const cancelModalButton = document.getElementById('cancelModal');

    activeDeleteModeButton.addEventListener('click', function(){
     isDeleteMode = true;
     popupModal.classList.add('hidden');
     modalOverlay.classList.add('hidden');
     deleteModeCheckbox.checked = true;
    });

    cancelModalButton.addEventListener('click', function() {
     popupModal.classList.add('hidden');
     modalOverlay.classList.add('hidden');
     deleteModeCheckbox.checked = false;
     isDeleteMode = false;
     enableScroll();
    })

    // スクロールを禁止する関数
    function disableScroll() {
      document.body.style.overflow = 'hidden';
    }

    // スクロールを許可する関数
    function enableScroll() {
      document.body.style.overflow = '';
    }


    // 'remove mode' チェックボックスの変更を監視
    deleteModeCheckbox.addEventListener('change', function() {
      isDeleteMode = deleteModeCheckbox.checked; 
      popupModal.classList.toggle('hidden', !isDeleteMode);
      modalOverlay.classList.toggle('hidden', !isDeleteMode);
        if (isDeleteMode) {
            disableScroll();
            // チェックボックスがチェックされたらモーダルを表示
            popupModal.classList.remove('hidden');
            modalOverlay.classList.remove('hidden');

        } else {
            enableScroll();
            // チェックボックスがアンチェックされたらモーダルを非表示に
            popupModal.classList.add('hidden');
            modalOverlay.classList.add('hidden');
        }
    
        // オーバーレイをクリックしたときにモーダルを非表示にする
        modalOverlay.addEventListener('click', function() {
          popupModal.classList.add('hidden');
          this.classList.add('hidden');
          deleteModeCheckbox.checked = false; // チェックボックスをアンチェックにする
          isDeleteMode = false;
          enableScroll();
      });
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
        parent.css({top: insets[0], right: insets[1], bottom: insets[2], left: insets[3]})
    }
}

document.addEventListener('DOMContentLoaded', function() {
  var categories = document.querySelectorAll('.category');
  var deleteModeCheckbox = document.getElementById('deleteModeCheckbox');

  // ドラッグ可能な要素の設定
  categories.forEach(function(category) {
      category.setAttribute('draggable', true);

      category.addEventListener('dragstart', function(e) {
          // ドラッグされるデータの id を設定
          e.dataTransfer.setData('text/plain', category.dataset.category);

          // ドラッグ中の要素にスタイルを適用
          category.classList.add('opacity-50');
      });

      category.addEventListener('dragend', function(e) {
          // ドラッグ終了後にスタイルを戻す
          category.classList.remove('opacity-50');
      });
  });

  // ドロップ可能なカレンダー領域の設定
  var calendar = document.getElementById('calendar');
  calendar.addEventListener('dragover', function(e) {
      e.preventDefault(); // ドロップイベントを有効にする
      calendar.classList.add('bg-gray-100'); // ハイライトスタイルの適用
  });

  calendar.addEventListener('dragleave', function(e) {
      calendar.classList.remove('bg-gray-100'); // ハイライトスタイルの削除
  });

  calendar.addEventListener('drop', function(e) {
      e.preventDefault(); // デフォルトの処理を停止
      var category = e.dataTransfer.getData('text/plain');

      // 削除モードが有効でない場合にスケジュールを追加
      if (!deleteModeCheckbox.checked) {
          // TODO: カレンダーにトレーニング部位を追加するロジック
          console.log('カレンダーに追加: ' + category);

          // ドロップ成功時のフィードバック
          alert('トレーニング部位 ' + category + ' を追加しました');
      }

      // ハイライトスタイルの削除
      calendar.classList.remove('bg-gray-100');
  });
});
