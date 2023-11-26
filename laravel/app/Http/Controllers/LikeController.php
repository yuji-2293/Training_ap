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


        // $training = Training::with('likes')->find($training->id);


        $user = Auth::user();

        // ログイン状態の確認
        if(!$user) {
        return response()->json(['error' => 'UnAuthenticated'], 401);
        }

   
        // トレーニングに対してすでにいいねが存在するかどうか確認
        try{
                $existingLike = $training->likes()->where('user_id', $user->id)->first();
                Log::info($existingLike);

        if( $existingLike) {
            // いいねが存在しないと、
            $existingLike->delete();
            $likeCount = $training->likes()->count();
            return response()->json(['isLiked' => false,'likeCount' => $training->likes()->count()]);
        }
            // いいねが存在していない場合は新規作成する
            $like = new Like();
            $like->user_id = $user->id;
            $like->training_id = $request->input('training_id');
            $like->save();
            $isLiked = true;
        
        // いいねの数を取得
        $likeCount = $training->likes()->count();

        return response()->json(['isLiked' => $isLiked, 'likeCount' => $likeCount , 'like' => $like, 'existingLike' => $existingLike]);
        
        } catch (\Exception $e) {
            Log::error('Toggle Like error: ' .$e->getMessage(),['user_id' => $user->id, 'training_id' => $request->input('training_id')]);
            return response()->json(['error' => 'An error occurred',500]);
        }


 

    }
}
