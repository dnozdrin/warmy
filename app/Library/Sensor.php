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
    protected $sensor;

    /**
     * Sensor constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $sensorId = config('app.sensor_id', false);
        if ($sensorId === false) {
            throw new \Exception('Sensor ID was not configured!', 1532625136);
        }

        $this->sensor = "/sys/devices/w1_bus_master1/{$sensorId}/w1_slave";
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function temperature(): int
    {
        $sensorResponse = file($this->sensor);
        if ($sensorResponse === false) {
            throw new \Exception('Unable to read data from sensor!', 1532712918);
        }
        $sensorData = explode('=', $sensorResponse[1]);

        return (int)$sensorData[1];
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
