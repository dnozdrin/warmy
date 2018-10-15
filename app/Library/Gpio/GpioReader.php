<?php

namespace App\Library\Gpio;

/**
 * Class GpioReader
 * @package App\Library\Gpio
 */
class GpioReader extends GpioControl
{
    /**
     * @return bool
     */
    public function isPinActive(): bool
    {
        $response = $this->readPinValue();

        return (bool)array_shift($response);
    }

    /**
     * @return array
     */
    protected function readPinValue(): array
    {
        exec("gpio -g read {$this->pin}", $response);

        if (empty($response) || !is_array($response)) {
            throw new \RuntimeException("No response on read request on GPIO pin {$this->pin}", 1539611050);
        }

        return $response;
    }
}
