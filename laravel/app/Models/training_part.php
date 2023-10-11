<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_part extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
}
