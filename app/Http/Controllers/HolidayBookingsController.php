<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use App\Booking;
use App\Holiday;

class HolidayBookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return back();
    }

    public function store(){
        $holiday = Holiday::where('id', request('holiday_id'))->first();
        $max_places = $holiday->max_participants - $holiday->bookings->sum('num_places');
        Booking::create(request()->validate([
            'holiday_id' => 'required',
            'user_id' => ['required', Rule::in([Auth::id()])],
            'num_places' => 'required|integer|max:'.$max_places.'|min:1'
        ]));
        return redirect('/bookings');
    }

    public function index(){
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('bookings.index', compact('bookings'));
    }

    public function show(Booking $booking){
        return back();
    }

    public function edit(Booking $booking){
        return back();
    }

    public function update(Booking $booking){
        $holiday = Holiday::where('id', request('holiday_id'))->first();
        $max_places = $holiday->max_participants - $holiday->bookings->sum('num_places') + $booking->num_places;
        $booking->update(request()->validate([
            'holiday_id' => 'required',
            'user_id' => ['required', Rule::in([Auth::id()])],
            'num_places' => 'required|integer|max:'.$max_places.'|min:1'
        ]));
        return redirect('/bookings');
    }

    public function destroy(Booking $booking){
        $booking->delete();
        return redirect('/bookings');
    }

    public function locations(){
        $bookings = Booking::where('user_id', Auth::id())->get();
        $lat = array();
        $long = array();
        $oldlat = array();
        $oldlong = array();
        foreach ($bookings as $booking){
            if ($booking->holiday->start_date > date('Y-m-d')){
                $lat[] = $booking->holiday->lat;
                $long[] = $booking->holiday->long;
            }
            else {
                $oldlat[] = $booking->holiday->lat;
                $oldlong[] = $booking->holiday->long;
            }
        }
        return view('/bookings.locations', compact('lat', 'long', 'oldlat', 'oldlong'));
    }
}
