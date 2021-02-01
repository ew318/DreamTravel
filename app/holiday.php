<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class holiday extends Model
{
    protected $fillable = [
        'title', 'description', 'location', 'lat', 'long', 'price', 'max_participants', 'start_date', 'end_date'
    ];

    public function holidayfeatures(){
        return $this->hasMany(HolidayFeature::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
