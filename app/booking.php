<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{    
    protected $fillable = [
        'holiday_id', 'user_id', 'num_places'
    ];

    public function holiday(){
        return $this->belongsTo(Holiday::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
