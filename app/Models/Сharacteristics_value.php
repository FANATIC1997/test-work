<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Сharacteristics_value extends Model
{
    use HasFactory;

    public function houses()
    {
        return $this->hasMany('App\Models\Houses', 'house_id');
    }

    public function characteristics()
    {
        return $this->hasMany('App\Models\Characteristics', 'characteristics_id');
    }
}
