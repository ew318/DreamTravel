<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Holiday;
use App\Feature;

class HolidaysController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function index(){
        $holidays = Holiday::where('start_date', '>', date('Y-m-d'))->get();
        return view('holidays.index', compact('holidays'));
    }
    public function show(Holiday $holiday){
        $remaining_places = $holiday->max_participants - $holiday->bookings->sum('num_places');
        return view('holidays.show', compact('holiday'), compact('remaining_places'));
    }
    public function create(){
        return view('holidays.create');
    }
    public function store(){
        Holiday::create(request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'location' => ['required', 'min:2'],
            'lat' => 'required',
            'long' => 'required',
            'price' => 'required|min:0',
            'max_participants' => 'required|integer|min:1',
            'start_date' => 'required|after:today|date|before:end_date',
            'end_date' => 'required|date|after:start_date'
        ]));
        return redirect('/holidays');
    }
    public function edit(Holiday $holiday){
        $all_features = Feature::all();
        return view('holidays.edit', compact('holiday'),compact('all_features'));
    }
    public function update(Holiday $holiday){
        $holiday->update(request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'location' => ['required', 'min:2'],
            'lat' => 'required',
            'long' => 'required',
            'price' => 'required|min:0',
            'max_participants' => 'required|integer|min:1',
            'start_date' => 'required|after:today|date|before:end_date',
            'end_date' => 'required|date|after:start_date'
        ]));
        return redirect('/holidays');
    }
    public function destroy(Holiday $holiday){
        $holiday->delete();
        return redirect('/holidays');
    }
}
