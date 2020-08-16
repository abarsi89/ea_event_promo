<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    /**
     * The events that belong to the performer.
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_performer');
    }
}
