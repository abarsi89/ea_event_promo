<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The performers that belong to the event.
     */
    public function performers()
    {
        return $this->belongsToMany(Performer::class, 'event_performer');
    }

    /**
     * Get the location that owns the event.
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    /**
     * The users that belong to the event.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
}
