<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part_event extends Model
{
    protected $table = 'Part_event';
    protected $fillable = ['title','start','category'];
    protected $dateFormat = 'Y-m-d  H:i:s';

    
}
