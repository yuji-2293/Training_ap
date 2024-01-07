# *トレログ*

トレログは筋トレで行ったことを記録、管理するWebアプリです

・トレーニング内容（名前、重量、回数）を記録、管理するWebアプリです

・その日に行うトレ部位をカレンダーに登録できます

・他のユーザーが行ったトレーニングを共有して見て、イイねすることができる。

# URL
(https://kukku999.xsrv.jp/)<br>

**※ゲストログインを配置していますのでそちらからまずはログインしてみてください**


# 機能一覧

・ログイン/ユーザー認証機能

**CRUD処理**

・マイメニューの登録（編集、削除）機能

・カレンダー機能

**ユーザーリレーション機能**

・イイね機能（Ajax）

# 機能概要

・**TOP画面**

・トップページにアクセスすると画面が描画されます

・ヘッダーにある**ゲストログイン、ユーザー登録、ログイン**でアプリの機能を利用してもらえます

<img width="1400" alt="スクリーンショット 2024-01-03 18 16 49" src="https://github.com/yuji-2293/Training_ap/assets/141961535/b52e4704-1251-4c55-8fcc-1ee2b272bf1d">


・**Laravel(Breeze)による認証機能**を実装しました

・Emailとパスワード、名前を登録することでアプリを利用できます。

<img width="1401" alt="ログイン画面" src="https://github.com/yuji-2293/Training_ap/assets/141961535/b3540fa3-a310-4c19-8100-011ba8f69846">


JavaScriptのライブラリFullcalendarを実装しました。

・**登録部位欄**にあるトレーニング部位をカレンダー日付に**ドラック＆ドロップ**することで**トレーニングの予定を立てられます**


<img width="５００" alt="カレンダー" src="https://github.com/yuji-2293/Training_ap/assets/141961535/364a2a80-e599-4bac-a64e-eec7812e9489">

・トレーニング部位欄の**下部**にある**「削除」**にチェックを入れると登録削除モードになります。
->カレンダーにある登録部位を**クリックすると**削除することができます

下の画像、**削除モード**に切り替わった状態です、通常はチェックボックスが空になっています

<img width="1451" alt="スクリーンショット 2024-01-08 0 51 24" src="https://github.com/yuji-2293/Training_ap/assets/141961535/666bc47b-fd8a-464e-ac25-cb7acc0f1745">


・空のチェックボックスを**クリック**すると**モーダル**が表示されます


<img width="1439" alt="スクリーンショット 2024-01-08 0 49 48" src="https://github.com/yuji-2293/Training_ap/assets/141961535/2ebc5990-8a7c-42c1-ac71-b736fbb722df">


・削除モードに切り替わった状態でカレンダー内の日付に登録されたトレーニング部位を**クリックすると**下の画像のように

**ポップアップが表示され、削除することができます**


<img width="1419" alt="スクリーンショット 2024-01-08 0 49 57" src="https://github.com/yuji-2293/Training_ap/assets/141961535/208194ee-ce1b-4e50-815b-c9d23b09535a">

## CRUD処理一覧

<img width="２５０" alt="マイメニュー登録" src="https://github.com/yuji-2293/Training_ap/assets/141961535/66e6ef0d-44af-415d-bd59-5c28b8583b92">

**マイメニュー登録**

<img width="５００" alt="マイメニュー編集:削除" src="https://github.com/yuji-2293/Training_ap/assets/141961535/5fb396f0-5d90-45ae-aee7-dc9c663fa1ef">

**マイメニュー編集.削除**

<img width="５００" alt="部位別の登録" src="https://github.com/yuji-2293/Training_ap/assets/141961535/adaf02c9-e99f-41ec-816f-06ace11e62d7">

**部位別登録**

<img width="500" alt="メニュー一覧" src="https://github.com/yuji-2293/Training_ap/assets/141961535/1ad9a3ce-d01c-493b-a203-5a561cb9470c">

**登録したマイメニューの一覧**




## ユーザーリレーション

<img width="５００" alt="共有画面（イイね！）" src="https://github.com/yuji-2293/Training_ap/assets/141961535/c10541fd-8ceb-4cb9-9add-98ef743746b1">

**共有画面（イイね機能付き）**

# 概要

### *"継続しやすいトレーニング記録アプリを作りたい"*
この思いから、トレーニングの記録に使われる機能の中から必要なものを絞り込み実装しました

初心者〜トレーニングの部位を分けて鍛えている中級者向けに使われることを想定し、

Fullcalendarを使って、その日に行うであろうトレーニング部位を一目見てわかるように可視化しました


# 開発背景

私は現在、食品会社の惣菜製造工場で勤務をしています。

その中で、自己研鑽のために会社の福利厚生の一環でスポーツジムに通い始めました。

トレーニングを記録し、スコアが上がっていく楽しみを見出せたこともあって仕事終わりや休日を利用して３年間継続することができました。

その経験から、そのジムでは紙に記録する方式で行っていましたが、「トレーニング→インターバル→トレーニング」の流れを阻害してストレスになっていたなと思い、これを解決して効率化したいという思いが生まれました。

# 使用技術

**フロントエンド**

・HTML

・CSS

・Tailwindcss 3.1.0

・flowbite(Tailwindcssのライブラリ) 1.8.1

・JavaScript

・Jquery(Ajax)

・Fullcalendar　6.1.8

**バックエンド**

・PHP 8.2

・Laravel(Breeze) 10.10

**インフラその他**

・Xserver

・Git/Github

・Apache

・MySQL/MriaDB 10.05

# ER図

<img width="942" alt="スクリーンショット 2024-01-03 19 45 08" src="https://github.com/yuji-2293/Training_ap/assets/141961535/5c00573f-bfff-4f4d-aa76-364e12713f7e">


# 苦労したこと

一番苦労したことは、Fullcalendarとバックエンドを連携させたところです。

Fullcalendar自体を取り入れるには問題ありませんでしたが、日付内にCRUD処理を組み込みDBを絡めるのに苦労しました。

UX的な観点を大事にしたかったので非同期処理を採用することにしましたが、フロントエンドの知識が私には欠けていたので、Javascriptの関数、Ajax処理、CSRF対策この機能を実装するだけで１ヶ月以上かかりました。

時間はかけることで、フロントエンドの問題を自分で調べ尽くし、デバックしながら試すことができました。

さらに、ここに、AIを取り入れることで加速度的に実装することができることを知りました。

# こだわり

苦労したFullcalendarの画面です。

機能面はJavaScriptによる非同期処理で実装しています。

カレンダーの日付にはトレーニング部位を登録することができ、その仕方も**ドラック＆ドロップ**するだけ！！

Fullcalendarの本来の機能とバックエンドの連携が１番の肝です。手軽であり、一目見ただけでその日のトレーニングが分かり、クリックするとトレーニング登録画面に遷移することができます

トレーニング部位欄の下部にはチェックボックスがあり、チェックすると日付に登録したトレーニング部位を削除する「remove mode」に変更することができます。

どちらも、カレンダー内ではページ遷移を行わずに行うことができます。

# 今後の展望

・レスポンシブ対応

・**ShopifyのAPIを連携（トレーニング内容に合ったトレーニングアイテムの提案機能）**

・ユーザープロフィール画面の充実


