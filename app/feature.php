<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feature extends Model
{
    protected $fillable = [
        'name', 'featuretype_id'
    ];

    public function featuretype(){
        return $this->belingsTo(FeatureType::class);
    }
}
