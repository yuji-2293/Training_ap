<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>モーダル</title>
    <!-- @vite('resources/css/micromodal.css') micromodalの基本cssの読み込み -->
    <!-- @vite('resources/js/app.js') インポートしたapp.jsを読み込む -->
    


</head>
<body>

    <!-- modal表示 -->

<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
  <!-- overlay部分をクリックしてcloseしたかったらdata-micromodal-closeをつける -->
    <div class="modal__overlay" tabindex="-1">
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Edit my Training
            <br>
          </h2>
          <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
<!-- モーダル本文 -->
         
<main class="modal__content" id="modal-1-content">
  
</main>
          <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
      </div>
    </div>
  </div>
  <a data-micromodal-trigger="modal-1" href='javascript:;'>Open Modal Dialog</a>


</body>
</html>