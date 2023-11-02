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



use App\Models\Training as ModelsTraining;


class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        return view ('layouts.trainings.index');
     }



    public function Json(Request $request, $id = -1)
        {
            if($id == -1){
            return Training::get()->toJson();
            }
            else {
            return Training::find($id)->toJson();
            }

        }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('layouts.trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //バリデーション記述
             //1:バリデーションルールの設定
             $rules = [
                'title' => 'required|max:100',
                'first_weight' =>'numeric|between:0,300',
                'second_weight' =>'numeric|between:0,300',
                'third_weight' =>'numeric|between:0,300',
                'first_rep' => 'numeric|between:0,300',
                'second_rep' => 'numeric|between:0,300',
                'third_rep' => 'numeric|between:0,300',
                  ];
            //      //2:バリデーションに引っかかった時のエラーメッセージの内容
                 
                $messages = ['required' => 'トレーニング名を記入してください', 
                'first_weight'=> '1setの重量が未記入です or [0]を記入してください',
                'second_weight'=> '2setの重量が未記入です or [0]を記入してください',
                'third_weight'=> '3setの重量が未記入です or [0]を記入してください',
                'first_rep'=> '1setの回数が未記入です or [0]を記入してください',
                'second_rep'=> '2setの回数が未記入です or [0]を記入してください',
                'third_rep'=> '3setの回数が未記入です or [0]を記入してください',
    
                 'max'=> '100文字以下にしてください', 'between' => '150以下の数字にしてください'];
                $validator = Validator::make($request->all(), $rules, $messages);
    
                if ($validator->fails()){
                return redirect('/create')->withErrors($validator)->withInput();
                }


            //トレーニング名の登録
            $training_date = new Training;
            $training_date->title = $request->input('title');
            $training_date->start = now()->format('Y-m-d', $request->input('start') / 1000);
            $training_date->end = now()->format('Y-m-d', $request->input('end') / 1000);
            $training_date->save();
            // set内容の登録
            $sets = [
            
                [
                    "weight" => $request->input("first_weight"), 
                    "rep" => $request->input("first_rep"), 
                    "set_id" => 1, 
                    "training_id" => $training_date["id"]
                ],
            ["weight" => $request->input("second_weight"), "rep" => $request->input("second_rep"), 
            "set_id" => 2, "training_id" => $training_date["id"]],
            ["weight" => $request->input("third_weight"), "rep" => $request->input("third_rep"), 
            "set_id" => 3, "training_id" => $training_date["id"]]
            ];
            $save_sets = set::insert($sets);

         return redirect('dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show($id){
      $events = Training::with('sets')->find($id);
      $sets = $events->sets;
      return view('layouts.trainings.show', compact('events','sets'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        Training::find($id)->delete();
        return redirect('/trainings');
    }
}
