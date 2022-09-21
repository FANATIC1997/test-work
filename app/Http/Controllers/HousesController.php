<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Houses;
use App\Models\Options;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HousesController extends Controller
{
    /**
     * Листинг помещений
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $queryHouses = Houses::limit(12);
        $classes = Classes::all()->values();
        $generalOptions = Options::all()->where('type_checkbox', 'general')->values();
        $servicesOptions = Options::all()->where('type_checkbox', 'service')->values();
        $allAdditionalOptions = Options::all()->where('type_checkbox', 'additional');
        $additionalOptions['main'] = $allAdditionalOptions->skip(0)->take(5)->values();
        $additionalOptions['other'] = $allAdditionalOptions->skip(5)->values();

        $houses = Houses::filtering($queryHouses, $request, $classes, $generalOptions);

        return view('houses.index')->with([
            'houses' => $houses->values(),
            'classes' => $classes,
            'generalOptions' => $generalOptions,
            'additionalOptions' => $additionalOptions,
            'servicesOptions' => $servicesOptions
        ]);
    }

    /**
     * Вывод одной записи об помещении
     *
     * @param Houses $houses
     * @return Application|Factory|View
     */
    public function show(Houses $houses)
    {
        return view("houses.show")->with('house', $houses);
    }

}
