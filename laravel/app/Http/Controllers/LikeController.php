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

class LikeController extends Controller
{
    public function toggleLike(Training $training)
    {
        $training->togglelike();
        $likesCount = $training->likes()->count();
        return response()->json(['likes_count'=>$likesCount]);
        // $user = Auth::user();
        // if(!$user) {
        //     return response()->json(['error' => 'Unauthenticated.'], 401);
        // }

        // $like = Like::where('user_id', $user->id)->where('training_id', $training->id)->first();

        // if($like) {
        //     $like->delete();
        // } else {
        //     Like::create([
        //         'user_id' => $user->id,
        //         'training_id' => $training->id
        //     ]);
        // }

        // $training = Training::with('likes')->find($training->id);

        // return response()->json(['likes_count' => $training->likes_count]);
    }
}
