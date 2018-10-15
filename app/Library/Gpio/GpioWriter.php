<?php

namespace App\Library\Gpio;

/**
 * Class GpioWriter
 * @package App\Library
 */
class GpioWriter extends GpioControl
{
    /**
     * Turn on a relay
     */
    public function turnOn()
    {
        exec("gpio -g write {$this->pin} 1");
    }

    /**
     * Turn off a relay
     */
    public function turnOff()
    {
        exec("gpio -g write {$this->pin} 0");
    }
}
