<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class part_event extends Model
{
    protected $table = 'Part_Events';
    protected $fillable = ['title','start','category'];
    protected $dateFormat = 'Y-m-d  H:i:s';

    
}
