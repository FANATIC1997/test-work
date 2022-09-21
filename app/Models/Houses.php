<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;

    public function characteristics()
    {
        return $this->belongsTo('App\Models\Characteristics_value', 'house_id');
    }

    public function class()
    {
        return $this->belongsTo('App\Models\Classes');
    }

    public function options()
    {
        return $this->belongsToMany(Options::class, 'houses_options', 'houses_id', 'option_id');
    }

    public function getTerm()
    {
        $arrayDate = explode('-', $this->term, 3);
        $term = '';
        if($arrayDate[1] <= 3){
            $term = '1 кв. '.$arrayDate[0].' г.';
        }elseif($arrayDate[1] >= 4 and $arrayDate[1] <= 6){
            $term = '2 кв. '.$arrayDate[0].' г.';
        }elseif($arrayDate[1] >= 7 and $arrayDate[1] <= 9){
            $term = '3 кв. '.$arrayDate[0].' г.';
        }elseif($arrayDate[1] >= 10 and $arrayDate[1] <= 12){
            $term = '4 кв. '.$arrayDate[0].' г.';
        }
        return $term;
    }
}
