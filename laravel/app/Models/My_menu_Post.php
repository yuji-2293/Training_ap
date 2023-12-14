<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\training_part;
class My_menu_Post extends Model
{
    protected $fillable = [
        'part_id',
    ];
    public $timestamps = false;
    protected $table = 'My_menu_Posts';
    protected $dates = [
        'created_at' ,
        'updated_at' ,
        'Up' ,
    ];

    public function training_part()
    {
    return $this->belongsTo(training_part::class);
    }

}
