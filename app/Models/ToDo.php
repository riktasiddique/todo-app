<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    public function getIsCompleteAttribute()
    {
        return $this->status == 1? true : false;
    }
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id')->withDefault();
    }
    use HasFactory;
}
