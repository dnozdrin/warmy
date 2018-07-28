<?php

namespace App\Library;

/**
 * Class GpioControl
 * @package App\Library
 */
class GpioControl
{
    /**
     * @var int
     */
    protected $pin;

    /**
     * GpioControl constructor.
     */
    public function __construct()
    {
        $this->pin = (int)config('app.gpio_pin');
        $this->setPinOutput();
    }

    /**
     * Set GPIO pin mode to output
     */
    private function setPinOutput()
    {
        exec("gpio -g mode {$this->pin} out");
    }

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
