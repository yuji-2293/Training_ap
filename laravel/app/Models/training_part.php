<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\mymenu_post;

class training_part extends Model
{
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
    protected $table = 'training_part';


    public function mymenu_post()
    {
    return $this->hasMany(mymenu_post::class,'part_id', 'id');
    }
}
