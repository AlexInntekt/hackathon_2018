<?php

namespace App\Http\Controllers;

use App\Building;
use App\Floor;
use App\Companie;
use App\Companies_to_building;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
            $companies_to_building = Companies_to_building::GetCompaniesToBuildings();
            $floors = Floor::GetFloors();
            $companies = Companie::GetCompanies();
            return view('company', compact('companies','buildings','floors','companies_to_building'));
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
            'building' => 'required',
            'floor' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect(url('/company'))
                        ->withErrors($validator)
                        ->withInput();
        }
        $company_id = Companie::insertNewCompany($request->all());
        Companies_to_building::insertNewRelation($request->all(),$company_id);
        Floor::updateFloors($request->all()['floor']);
        return redirect(url('/company'));
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
