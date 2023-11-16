<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\set;


class Training extends Model
{
    protected $table = 'trainings';
    protected $fillable = ['title', 'part_id'];


    public function sets()
    {
    return $this->hasMany(set::class);
    }

}
