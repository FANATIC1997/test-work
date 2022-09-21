<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Houses;
use App\Http\Requests\StoreHousesRequest;
use App\Http\Requests\UpdateHousesRequest;
use App\Models\Options;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class HousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queryHouses = Houses::limit(10);
        $classes = Classes::all()->values();
        $generalOptions = Options::all()->where('type_checkbox', 'general')->values();
        $servicesOptions = Options::all()->where('type_checkbox', 'service')->values();
        $allAdditionalOptions = Options::all()->where('type_checkbox', 'additional');
        $additionalOptions['main'] = $allAdditionalOptions->skip(0)->take(2)->values();
        $additionalOptions['other'] = $allAdditionalOptions->skip(2)->values();

        if ($request->has('deadline')) {
            $date = date("Y-m-d");
            $date = strtotime($date);

            //$date = date('Y-m-d', $date);
            if($request->input('deadline') == 'passed'){
                $queryHouses->where('term', '<', date('Y-m-d', $date));
            }else if($request->input('deadline') == 'this-year'){
                $queryHouses->where('term', '>', date('Y-m-d', $date));
                $date = strtotime("+1 year", $date);
                $queryHouses->where('term', '<', date('Y', $date));
            }else if($request->input('deadline') == 'next-year'){
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
            $queryHouses->join('houses_options', 'houses.id', '=', 'houses_id')->where(['option_id' => $searchOptionArray]);

        unset($searchOptionArray);

        $houses = $queryHouses->get();


        return view('houses.index')->with([
            'houses' => $houses->values(),
            'classes' => $classes,
            'generalOptions' => $generalOptions,
            'additionalOptions' => $additionalOptions,
            'servicesOptions' => $servicesOptions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreHousesRequest $request
     * @return void
     */
    public
    function store(StoreHousesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Houses $houses
     * @return \Illuminate\Http\Response
     */
    public
    function show(Houses $houses)
    {
        return view("houses.show")->with('house', $houses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Houses $houses
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Houses $houses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateHousesRequest $request
     * @param \App\Models\Houses $houses
     * @return \Illuminate\Http\Response
     */
    public
    function update(UpdateHousesRequest $request, Houses $houses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Houses $houses
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Houses $houses)
    {
        //
    }
}
