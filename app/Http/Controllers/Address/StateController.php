<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{

    public function index()
    {
        $states=State::all();
        return view('pages.address.state.index',[
            'states'=>$states,
            'countries'=>Country::all(),
        ]);
    }


    public function create()
    {
        $states=State::all();
        return view('pages.address.state.create',[
            'states'=>$states,
            'countries'=>Country::all(),
        ]);
    }


    public function store(Request $request)
    {
        State::create([
            'name'=>$request->name,
            'country_id'=>$request->countrie_id
        ]);
        return redirect()->route('states.index')->with([
            'success'=>'This States Create success'
        ]);
    }


    public function show(State $state)
    {
        //
    }


    public function edit($id)
    {
        $state=State::find($id);
        return view('pages.address.state.edit',[
            'state'=>$state
        ]);
    }

    public function update(Request $request, State $state)
    {
        $state=State::find($request->id);
        $state->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('states.index')->with([
            'success'=>'This States Update success'
        ]);
    }


    public function destroy(Request $request)
    {
        State::destroy($request->id);
        return redirect()->back()->with([
            'success'=>'DELETE success'
        ]);
    }
}
