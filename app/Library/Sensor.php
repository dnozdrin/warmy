<?php

namespace App\Library;

/**
 * @todo: custom exceptions
 */
class Sensor
{
    /**
     * @var string
     */
    private $sensorPath;

    /**
     * Sensor constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $sensorId = config('app.sensor_id', '');
        if ($sensorId === '') {
            throw new \Exception('Sensor ID was not configured!', 1532625136);
        }

        $this->sensorPath = "/sys/devices/w1_bus_master1/{$sensorId}/w1_slave";
    }

    /**
     * @return int
     * @throws \Exception
     */
    private function temperature(): int
    {
        $sensorResponse = file($this->sensorPath);
        if ($sensorResponse === false) {
            throw new \Exception('Unable to read data from sensor!', 1532712918);
        }
        $temperature = explode('=', $sensorResponse[1]);

        return (int)$temperature[1];
    }

    /**
     * @return float
     * @throws \Exception
     */
    public function temperatureFormatted(): float
    {
        return round($this->temperature() / 1000, 1);
    }
}
