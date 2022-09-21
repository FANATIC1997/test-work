<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Houses extends Model
{
    use HasFactory;

    /**
     * Связь с характеристиками помещения (не доделано)
     * @return BelongsTo
     */
    public function characteristics(): BelongsTo
    {
        return $this->belongsTo('App\Models\Characteristics_value', 'house_id');
    }

    /**
     * Связь с классом помещения
     * @return BelongsTo
     */
    public function class(): BelongsTo
    {
        return $this->belongsTo('App\Models\Classes');
    }

    /**
     * Связь с опциями
     * @return BelongsToMany
     */
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Options::class, 'houses_options', 'houses_id', 'option_id');
    }

    /**
     * Получение квартала
     * @return string
     */
    public function getTerm(): string
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

    /**
     * Фильтрация данных по запросу
     * @param $queryHouses
     * @param $request
     * @param $classes
     * @param $generalOptions
     * @return mixed
     */
    static function filtering($queryHouses, $request, $classes, $generalOptions)
    {
        if ($request->has('deadline')) {
            $date = date("Y-m-d");
            $date = strtotime($date);

            if ($request->input('deadline') == 'passed') {
                $queryHouses->where('term', '<', date('Y-m-d', $date));
            } else if ($request->input('deadline') == 'this-year') {
                $queryHouses->where('term', '>', date('Y-m-d', $date));
                $date = strtotime("+1 year", $date);
                $queryHouses->where('term', '<', date('Y', $date));
            } else if ($request->input('deadline') == 'next-year') {
                $date = strtotime("+1 year", $date);
                $queryHouses->where('term', '>', date('Y', $date));
            }
        }
        foreach ($classes as $class) {
            if ($request->has($class['name_trans'])) {
                if ($request->input($class['name_trans']) == 'on') {
                    $queryHouses->where('class_id', $class->id);
                }
            }
        }
        $searchOptionArray = [];
        foreach ($generalOptions as $option) {
            if ($request->has($option['name_trans'])) {
                if ($request->input($option['name_trans']) == 'on') {
                    $searchOptionArray[] = $option->id;
                }
            }
        }

        if (count($searchOptionArray) > 0)
            $queryHouses->join('houses_options', 'houses.id', '=', 'houses_id')->whereIn('option_id', $searchOptionArray);

        unset($searchOptionArray);

        return $queryHouses->get();
    }
}
