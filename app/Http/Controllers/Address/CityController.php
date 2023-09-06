<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities=City::all();
        return view('pages.address.city.index',[
            'cities'=>$cities,
            'states'=>State::all(),
        ]);
    }


    public function create()
    {
        $cities=City::all();
        return view('pages.address.city.create',[
            'cities'=>$cities,
            'states'=>State::all(),
        ]);
    }


    public function store(Request $request)
    {
        City::create([
            'name'=>$request->name,
            'status'=>$request->status,
            'state_id'=>$request->state_id
        ]);
        return redirect()->route('cities.index')->with([
            'success'=>'This Citie Create success'
        ]);
    }


    public function show(Citie $citie)
    {
        //
    }


    public function edit($id)
    {
        $citie=City::find($id);
        return view('pages.address.city.edit',[
            'city'=>$citie,
            'state'=>State::all()
        ]);
    }


    public function update(Request $request, City $citie)
    {
        $citie= City::find($request->id);
        $citie->update([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        return redirect()->route('cities.index')->with([
            'success'=>'This City Update success'
        ]);
    }


    public function destroy(Request $request)
    {
        City::destroy($request->id);
        return redirect()->back()->with([
            'success'=> 'DELETE success'
        ]);
    }
}
