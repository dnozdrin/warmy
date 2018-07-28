<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    /**
     * Get the related days for the mode.
     */
    public function days()
    {
        return $this->belongsToMany('App\Day', 'modes_days', 'mode_id', 'day_identifier');
    }
}
