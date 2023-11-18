<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\training;
use App\Models\User;

class set extends Model
{
    protected $table = 'sets';
    public $timestamps = false;
    protected $fillable = ['weight', 'rep','training_id', 'set_id','part_id','other_user_id'];
    protected $guarded = ['status', ];

    public function training()
    {
    return $this->belongsTo(Training::class);
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
