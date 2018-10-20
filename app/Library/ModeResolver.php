<?php

namespace App\Library;

use App\Mode;

/**
 * Class ModeResolver
 * @package App\Library
 */
class ModeResolver
{
    /**
     * @return Mode|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function findSuitableMode()
    {
        $time = date('H:i:s');
        $day = $this->getCurrentDayNumber();

        $mode = Mode::whereHas('days', function($query) use ($day) {
                $query->where('identifier', '=', $day);
            })
            ->where(function ($query) use ($time) {
                $query->where([
                    ['enabled', '=', 1],
                    ['period_start', '<=', $time],
                    ['period_end', '>=', $time]
                ])->whereColumn('period_start', '<', 'period_end');
            })
            ->orWhere(function ($query) use ($time) {
                // for night time
                $query
                    ->whereColumn('period_start', '>', 'period_end')
                    ->where(function ($query) use ($time) {
                      $query->where([
                          ['enabled', '=', 1],
                          ['period_start', '<=', $time],
                      ])->orWhere('period_end', '>=', $time);
                  });
            })

            ->orderBy('updated_at', 'desc')
            ->first();

        return $mode;
    }


    /**
     * @return int
     */
    private function getCurrentDayNumber()
    {
        $day = (int)date('w');
        return $day > 0 ? $day : 7;
    }

    /**
     * @return float
     */
    public function getTargetTemperature(): float
    {
        $mode = $this->findSuitableMode();

        return (float)$mode->target_temperature;
    }
}
