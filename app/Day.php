<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the related modes for the day.
     */
    public function modes()
    {
        return $this->belongsToMany('App\Mode', 'modes_days', 'day_identifier', 'mode_id');
    }
}
