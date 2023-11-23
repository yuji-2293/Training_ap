<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\set;
use App\Models\User;


class Training extends Model
{
    protected $table = 'trainings';
    protected $fillable = ['title', 'part_id','set_id','other_user_id'];


    public function sets()
    {
    return $this->hasMany(set::class);
    }
    public function user()
    {
    return $this->belongsTo(User::class,'other_user_id');
    }
    public function likes(){
    return $this->hasMany(Like::class);
    }
    


}
