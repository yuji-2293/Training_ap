<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\training_part;
use App\Models\My_menu_Post;
use App\Http\Requests\CorpRequest;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = ['name' => 'required|max:100',];                

            $messages = ['required' => '必要事項が入力されていません', 
                         'max'=> '100文字以下にしてください',];
                         $validator = Validator::make($request->all(), $rules, $messages);

                            if ($validator->fails()){
                            return redirect('Mymenu')->withErrors($validator)->withInput();}

                            $part_data = new My_menu_post;
                            $part_data->name =  $request->input('name');
                            $part_data->part_id = $request->input('part_id');
                            $part_data->save();
                            // マイメニュー確認画面ができたらそのページに遷移する
                            return view('trainings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(My_menu_Post $My_menu_post)
    {
        $parts = training_part::all();
        dd($My_menu_post);
        return view('trainings.Mymenu',compact('parts','My_menu_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
