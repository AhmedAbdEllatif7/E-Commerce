<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index()
    {
        $countries=Country::all();
        return view('pages.address.country.index',[
            'countries'=>$countries
        ]);
    }


    public function create()
    {
        $countries=Country::all();
        return view('pages.address.country.create',[
            'countries'=>$countries
        ]);
    }


    public function store(Request $request)
    {
        Country::create([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('country.index')->with(['success'=>'success']);
    }


    public function show(Country $country)
    {
        //
    }


    public function edit($id)
    {
        $countrie=Country::find($id);
        return view('pages.address.country.edit',[
            'countrie'=>$countrie
        ]);
    }


    public function update(Request $request, Country $country)
    {
        $countrie=Country::find($request->id);
        $countrie->update([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('country.index')->with([
            'success'=>'Successfully'
        ]);
    }


    public function destroy(Request $request)
    {
        Country::destroy($request->id);
        return redirect()->back()->with([
            'warning'=>'Delete'
        ]);
    }
}
