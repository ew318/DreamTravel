<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class featuretype extends Model
{
    protected $fillable = [
        'name'
    ];

    public function features(){
        return $this->hasMany(Feature::class);
    }
}
