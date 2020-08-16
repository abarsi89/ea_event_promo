<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * Get the events for the location.
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
