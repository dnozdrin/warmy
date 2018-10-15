<?php

namespace App\Library\Gpio;

/**
 * Class GpioControl
 * @package App\Library\Gpio
 */
abstract class GpioControl
{
    /**
     * @var int
     */
    protected $pin;

    /**
     * GpioWriter constructor.
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
}
