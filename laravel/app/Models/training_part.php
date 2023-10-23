<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\My_menu_post;

class training_part extends Model
{
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
    protected $table = 'training_part';


    public function My_menu_posts()
    {
    return $this->hasMany(My_menu_Post::class);
    }
}
