<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\My_menu_Post;

class training_part extends Model
{
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
    protected $table = 'training_part';
    protected $dates = [
        'created_at',
        'updated_at',
        'Up',
    ];


    public function My_menu_Posts()
    {
    return $this->hasMany(My_menu_Post::class);
    }
}
