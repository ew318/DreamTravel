<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HolidayFeature;

class HolidayFeaturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function store(){
        HolidayFeature::create(request()->validate([
            'holiday_id' => 'required',
            'feature_id' => 'required'
        ]));
        return back();
    }

    public function destroy(HolidayFeature $holidayfeature){
        $holidayfeature->delete();
        return back();
    }
}
