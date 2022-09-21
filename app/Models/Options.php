<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    public function houses()
    {
        return $this->belongsToMany(Houses::class, 'houses_options', 'option_id', 'houses_id');
    }
}
