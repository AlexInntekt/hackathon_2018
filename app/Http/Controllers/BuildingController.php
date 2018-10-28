<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Building;
use App\Parking_lot;
use App\Companies_to_building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->getAttributes()['id']==1){
            $buildings = Building::GetBuildings();
            $parkings = Parking_lot::GetParkingLots();
            $companies_to_building = Companies_to_building::GetCompaniesToBuildings();
            return view('buildings', compact('parkings','buildings','companies_to_building'));
        }
        else
            return view('error');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no_floors' => 'required',
            'no_elevators' => 'required',
            'parking' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect(url('/buildings'))
                        ->withErrors($validator)
                        ->withInput();
        }
        $building_id = Building::insertNewBuilding($request->all());
        Floor::insertNewFloors($request->get('no_floors'),$building_id);
        return redirect(url('/buildings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
