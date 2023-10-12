<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\training_part;
class mymenu_post extends Model
{
    protected $fillable = [
        'part_id',
    ];
    public $timestamps = false;
    protected $table = 'mymenu_post';

    public function training_part()
    {
    return $this->belongsTo(training_part::class);
    }

}
