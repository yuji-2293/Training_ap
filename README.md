# *トレログ*

トレログは筋トレで行ったことを記録、管理するWebアプリです

・トレーニング内容（名前、重量、回数）を記録、管理するWebアプリです

・その日に行うトレ部位をカレンダーに登録できます

・他のユーザーが行ったトレーニングを共有して見て、イイねすることができる。

# URL
(https://kukku999.xsrv.jp/)<br>


# 機能一覧

・ログイン/ユーザー認証機能

**CRUD処理**

・マイメニューの登録（編集、削除）機能

・カレンダー機能

**ユーザーリレーション機能**

・イイね機能（Ajax）

# 機能概要

<img width="800" alt="スクリーンショット 2024-01-02 11 00 39" src="https://github.com/yuji-2293/Training_ap/assets/141961535/4e9651d9-7bd8-46a6-bc71-fc4b36eafce2">

**TOP画面**

<img width="1401" alt="ログイン画面" src="https://github.com/yuji-2293/Training_ap/assets/141961535/b3540fa3-a310-4c19-8100-011ba8f69846">

Laravel(Breeze)による認証機能を実装しました

<img width="５００" alt="カレンダー" src="https://github.com/yuji-2293/Training_ap/assets/141961535/364a2a80-e599-4bac-a64e-eec7812e9489">

JavaScriptのライブラリFullcalendarを実装しました

## CRUD処理一覧
<img width="２５０" alt="マイメニュー登録" src="https://github.com/yuji-2293/Training_ap/assets/141961535/66e6ef0d-44af-415d-bd59-5c28b8583b92">
<img width="５００" alt="マイメニュー編集:削除" src="https://github.com/yuji-2293/Training_ap/assets/141961535/5fb396f0-5d90-45ae-aee7-dc9c663fa1ef">

<img width="５００" alt="部位別の登録" src="https://github.com/yuji-2293/Training_ap/assets/141961535/adaf02c9-e99f-41ec-816f-06ace11e62d7">
<img width="500" alt="メニュー一覧" src="https://github.com/yuji-2293/Training_ap/assets/141961535/1ad9a3ce-d01c-493b-a203-5a561cb9470c">

マイメニューの登録〜編集、削除までの一連の流れです



## ユーザーリレーション

<img width="５００" alt="共有画面（イイね！）" src="https://github.com/yuji-2293/Training_ap/assets/141961535/c10541fd-8ceb-4cb9-9add-98ef743746b1">

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

・Tailwindcss

・flowbite(Tailwindcssのライブラリ)

・JavaScript

・Jquery(Ajax)

・Fullcalendar

**バックエンド**

・PHP 8.2

・Laravel(Breeze) 10.10

**インフラその他**

・Xserver

・Git/Github

・Apache

・MySQL/MriaDB 10.05

