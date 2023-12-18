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
    public function toggleLike(Training $training, Like $lile,  Request $request)
{
   $user_id = Auth::user()->id;
   $training_id = $request->training_id;
   $existingLike = Like::where('user_id', $user_id)->where('training_id',$training_id)->first();

            if (!$existingLike) {
            // いいねが存在していない場合は新規作成
            $like = new Like();
            $like->user_id = $user_id;
            $like->training_id = $training_id;
            $like->save();
            $isLiked = true;
            } else {
                // すでにいいねが存在する場合は削除
                // Like::where('training_id', $training_id)->where('user_id',$user_id)->delete();
                $existingLike->delete();
                $isLiked = false;
            }
                $likeCount = $training->likes()->count();
                return response()->json(['isLiked' => $isLiked, 'likeCount' => $likeCount]);

 }
    
}
