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
use App\Models\Part_event;

class CalendarController extends Controller
{
    public function index(Request $request, $id = -1){

            if($id == -1){
                return Part_event::get()->toJson();
                }
                else {
                return Part_event::find($id)->toJson();
                }
    
    }
    public function store(Request $request){
        $data = $request->all();

        $event = new Part_event();
        $event->title = $data['title'];
        $event->start = $data['start'];
        $event->category = $data ['category'];

        $event->save();

        return response()->json(['message' => 'イベントを保存しました']);
    }

    
}
