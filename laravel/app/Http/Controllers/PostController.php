<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\training_part;
use App\Models\My_menu_Post;
use App\Http\Requests\CorpRequest;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function Mymenu(My_menu_Post $My_menu_post)
    {
       $parts = training_part::all();
       return view('trainings.Mymenu',compact('parts','My_menu_post'));
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        // DBの値を取得してビューに渡す処理
        $parts = training_part::all();
            $chest = $parts->find(1);
            $back = $parts->find(2);
            $legs = $parts->find(3);
            $arms_shoulders = $parts->find(4);
            $other = $parts->find(5);
        $POST = My_menu_post::all();

        return view('trainings.Mymenu_post',compact('chest','back','legs','arms_shoulders','other', 'POST', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'part_id' =>'required',
            'name' => 'required|max:100'
                  ];                

            $messages = [
                'part_id' => '登録する部位を選択してください',
                'required' => '必要事項が[選択/入力]されていません', 
                'max'=> '100文字以下にしてください',
                    ];
                        $validator = Validator::make($request->all(), $rules, $messages);

                        if ($validator->fails()){
                        return redirect('Mymenu')->withErrors($validator)->withInput();}

                        $part_data = new My_menu_post;
                        $part_data->name =  $request->input('name');
                        $part_data->part_id = $request->input('part_id');
                        $part_data->Up = now()->format('Y-m-d', $request->input('created_at') / 1000);
                        $part_data->created_at = now()->format('Y-m-d', $request->input('timestamps') );
                        $part_data->updated_at = now()->format('Y-m-d', $request->input('timestamps') );

                        $part_data->save();
                        // マイメニュー確認画面ができたらそのページに遷移する
                        return redirect()->route('part_create');
                    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $show = My_menu_Post::find($id);
        $parts = training_part::all();

        return view('trainings.edit',compact('show','parts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = ['name' => 'required|max:100',
                  'part_id'=>'required'];                

        $messages = ['required' => '必要事項が[選択/入力]されていません',
                     'part_id' =>'登録する部位を選択してください', 
                    'max'=> '100文字以下にしてください',];
                    $validator = Validator::make($request->all(), $rules, $messages);
                    if ($validator->fails()){
                    return redirect()->route('part_edit',['id'=>$id])->withErrors($validator)->withInput();}

        $update = My_menu_Post::find($id);
        $update->name = $request->name;
        $update->part_id = $request->part_id;
        $update->save();
        return redirect()->route('part_create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroy = My_menu_Post::find($id);
        $destroy->delete();
        return redirect()->route('part_create');
    }
}
