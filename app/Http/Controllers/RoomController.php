<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;
use App\Floor;
use App\Companie;
use App\Room;
use App\Companies_to_building;

class RoomController extends Controller
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
            $floors = Floor::GetFloors();
            $companies = Companie::GetCompanies();
            $rooms = Room::GetRooms();
            return view('room', compact('companies','buildings','floors', 'rooms'));
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
            'type' => 'required',
            'building' => 'required',
            'floor' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect(url('/alerts'))
                        ->withErrors($validator)
                        ->withInput();
        }
        $room = Room::insertRoom($request->all());
        return redirect(url('/room'));
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
