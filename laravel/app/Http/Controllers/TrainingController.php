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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $parts = training_part::all();
        $chest = $parts->find(1);
        $back = $parts->find(2);
        $legs = $parts->find(3);
        $arms_shoulders = $parts->find(4);
        $other = $parts->find(5);
        $POST = My_menu_post::all();
        return view('layouts.trainings.create',compact('chest','back','legs','arms_shoulders','other', 'POST', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            [
                "weight" => $request->input("second_weight"), 
                "rep" => $request->input("second_rep"), 
                "set_id" => 2, 
                "training_id" => $training_date["id"]
            ],

            [
                "weight" => $request->input("third_weight"),
                "rep" => $request->input("third_rep"), 
                "set_id" => 3, 
                "training_id" => $training_date["id"]
             ]
            ];
            
            $save_sets = set::insert($sets);

           return redirect('/');
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
