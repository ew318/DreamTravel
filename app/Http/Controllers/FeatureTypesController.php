<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeatureType;

class FeatureTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $featuretypes = featuretype::all();
        return view('featuretypes.index', ['featuretypes' => $featuretypes]);
    }

    public function show(featuretype $featuretype){
        return view('featuretypes.show', compact('featuretype'));
    }

    public function create(){
        return view('featuretypes.create');
    }

    public function store(){
        featuretype::create(request()->validate([
            'name' => 'required|unique:featuretypes|min:3'
        ]));
        return redirect('/featuretypes');
    }

    public function edit(featuretype $featuretype){
        return view('featuretypes.edit', compact('featuretype'));
    }

    public function update(featuretype $featuretype){
        $featuretype->update(request()->validate([
            'name' => 'required|unique:featuretypes|min:3'
        ]));
        return redirect('/featuretypes');
    }

    public function destroy(featuretype $featuretype){
        $featuretype->delete();
        return redirect('/featuretypes');
    }
}
