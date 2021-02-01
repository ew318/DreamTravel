<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;

class FeaturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return back();
    }

    public function show(feature $feature){
        return back();
    }

    public function create(){
        return back();
    }

    public function store(){
        feature::create(request()->validate([
            'name' => 'required|min:3|unique:features',
            'featuretype_id' => 'required'
        ]));
        return redirect('/features');
    }

    public function edit(feature $feature){
        return view('features.edit', compact('feature'));
    }
    public function update(feature $feature){
        $feature->update(request()->validate([
            'name' => 'required|min:3|unique:features',
            'featuretype_id' => 'required'
        ]));
        return back();
    }

    public function destroy(feature $feature){
        $feature->delete();
        return back();
    }
}
