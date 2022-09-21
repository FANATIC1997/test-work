<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Сharacteristics extends Model
{
    use HasFactory;

    public function value()
    {
        return $this->belongsTo('App\Models\Characteristics_value', 'characteristics_id');
    }
}
