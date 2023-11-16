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

// ※Topやワークアウト関連についてはTrainingControllerで記述する //

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
    public function chest(Request $request)
    {
        $parts = training_part::all();
        $chest = $parts->find(1);
        $POST = My_menu_post::all();
        return view('layouts.trainings.chest',compact('chest', 'POST', ));
    }
    public function back(Request $request)
    {
        $parts = training_part::all();
        $back = $parts->find(2);
        $POST = My_menu_post::all();
        return view('layouts.trainings.back',compact('back', 'POST', ));
    }
    public function legs(Request $request)
    {
        $parts = training_part::all();
        $legs = $parts->find(3);
        $POST = My_menu_post::all();
        return view('layouts.trainings.legs',compact('legs', 'POST', ));
    }
    public function arms_shoulders(Request $request)
    {
        $parts = training_part::all();
        $arms_shoulders = $parts->find(4);
        $POST = My_menu_post::all();
        return view('layouts.trainings.arms_shoulders',compact('arms_shoulders', 'POST', ));
    }
    public function other(Request $request)
    {
        $parts = training_part::all();
        $other = $parts->find(5);
        $POST = My_menu_post::all();
        return view('layouts.trainings.other',compact('other', 'POST', ));
    }

    public function allTrainings(){
        $parts = training_part::all();
        $chest = $parts->find(1);
        $back = $parts->find(2);
        $legs = $parts->find(3);
        $arms_shoulders = $parts->find(4);
        $other = $parts->find(5);
        $POST = My_menu_post::all();



        return view('layouts.trainings.all',compact('chest','back','legs','arms_shoulders','other'));
    
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $rules = [
            'title' =>'required'|'max:100',
            'weight' =>'required'|'min:0',
            'rep' => 'required'|'min:1'
            ];                

            $messages = [
                'title' => '登録するトレーニングを入力してください',
                'required' => '必要事項が[入力]されていません', 
                'max'=> '100文字以下にしてください',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

        try{
              $training = Training::create([
        'title' => $request->input('title'),
        'part_id' => $request->input('part_id'),
        ]);
        $sets =[];
        $sets[] = [
         'weight' => (int) $request->input("weight"),
         'rep' => (int) $request->input("rep"),
         'set_id' => $request->input('sets'),
         'Training_id' => $training->id,
         'part_id' => $training->part_id,
         ];

        Set::insert($sets);
        
        return redirect()->back()->with('success','データが登録されました！');
        } catch (\Exception $e){
          return redirect()->back()->with('error','データの登録に失敗しました。もう一度お試しください。');
        }



        //     //トレーニング名の登録
        // $training_date = new Training;
        // $training_date->title = $request->input('title');
        // $training_date->start = now()->format('Y-m-d', $request->input('start') / 1000);
        // $training_date->end = now()->format('Y-m-d', $request->input('end') / 1000);
        // $training_date->save();
        // // set内容の登録
        // $sets = [
        
        //     [
        //         "weight" => $request->input("first_weight"), 
        //         "rep" => $request->input("first_rep"), 
        //         "set_id" => 1, 
        //         "training_id" => $training_date["id"]
        //     ],
        //     [
        //         "weight" => $request->input("second_weight"), 
        //         "rep" => $request->input("second_rep"), 
        //         "set_id" => 2, 
        //         "training_id" => $training_date["id"]
        //     ],

        //     [
        //         "weight" => $request->input("third_weight"),
        //         "rep" => $request->input("third_rep"), 
        //         "set_id" => 3, 
        //         "training_id" => $training_date["id"]
        //      ]
        //     ];
            
        //     $save_sets = set::insert($sets);

        //    return redirect('/');
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
