<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\set;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Models\training_part;
use App\Models\my_menu_post;
use App\Models\part_event;

//Top画面のFullCalendar関連の記述

class CalendarController extends Controller
{
    //DBに保存されたFullCalendarへのデータをjson形式で出力する処理
    public function index(Request $request, $id = -1){

            if($id == -1){
                return Part_event::get()->toJson();
                }
                else {
                return Part_event::find($id)->toJson();
                }
    
    }
    //ドラッグ&ドロップでイベントをDBに保存する処理
    public function store(Request $request){
        $data = $request->all();

        $event = new part_event();
        $event->title = $data['title'];
        $event->start = $data['start'];
        $event->category = $data ['category'];

        $event->save();

        return response()->json(['message' => 'イベントを保存しました']);
    }
    //FullCalendarの削除機能の処理
    public function destroy($id) {
        $destroy = Part_event::find($id);
        if(!$destroy) {
         return response()->json(['message'=>'イベントが見つかりません'],404);
        }
        $destroy->delete();
    return response()->json(['message' => 'イベントを削除しました']);
    }

    
}
