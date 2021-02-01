<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class holidayfeature extends Model
{
    protected $fillable = [
        'holiday_id', 'feature_id'
    ];

    public function feature(){
        return $this->belongsTo(Feature::class);
    }

    public function holiday(){
        return $this->belongsTo(Holiday::class);
    }
}
