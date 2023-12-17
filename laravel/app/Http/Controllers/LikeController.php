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
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class LikeController extends Controller
{
    public function toggleLike(Training $training, Request $request)
{
    $user_id = Auth::user()->id;
    $training_id = $request->training_id;
    $existingLike = Like::where('user_id',$user_id)->where('training_id',$training_id);

    if(!$existingLike){
     $like = new Like;
     $like->user_id = $user_id;
     $like->training_id = $training_id;
     $like->save(); 
    } else {
     Like::where('training_id',$training_id)->where('user_id',$user_id)->delete();
    }
    
    $likeCount = $training->likes()->count();
    $param = [
        'likeCount' => $likeCount,
    ];
    return response()->json($param);


//     $user = Auth::user();

//     try {
//         return DB::transaction(function () use ($training, $request, $user) {
//             $existingLike = $training->likes()->where('user_id', $user->id)->first();

//             if ($existingLike) {
//                 // すでにいいねが存在する場合は削除
//                 $existingLike->delete();
//                 $likeCount = $training->likes()->count();
//                 return response()->json(['isLiked' => false, 'likeCount' => $likeCount]);
//             }

//             // いいねが存在していない場合は新規作成
//             $like = new Like();
//             $like->user_id = $user->id;
//             $like->training_id = $request->input('training_id');
//             $like->save();
//             $isLiked = true;

//             // いいねの数を取得
//             $likeCount = $training->likes()->count();

//             return response()->json(['isLiked' => $isLiked, 'likeCount' => $likeCount, 'like' => $like]);
//         });
//     } catch (\Exception $e) {
//         Log::error('Toggle Like error: ' . $e->getMessage(), ['user_id' => $user->id, 'training_id' => $request->input('training_id')]);
//         return response()->json(['error' => 'An error occurred', 500]);
//     }
 }
    
}
