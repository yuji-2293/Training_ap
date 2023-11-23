<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\set;
use App\Models\User;
use App\Models\Training;
class Like extends Model
{
    protected $table = 'likes';
    protected $fillable = ['user_id','training_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Training()
    {
        return $this->belongsTo(Training::class);
    }
}
