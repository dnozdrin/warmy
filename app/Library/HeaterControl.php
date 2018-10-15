<?php

namespace App\Library;

use App\Library\Gpio\GpioWriter;
use App\Library\Gpio\GpioReader;

/**
 * Class HeaterControl
 * @package App\Library
 */
class HeaterControl
{
    /**
     * @var Sensor
     */
    protected $sensor;

    /**
     * @var ModeResolver
     */
    protected $modeResolver;

    /**
     * @var GpioWriter
     */
    protected $gpioWriter;

    /**
     * @var GpioReader
     */
    protected $gpioReader;

    /**
     * Thermostat constructor.
     * @param Sensor $sensor
     * @param ModeResolver $modeResolver
     * @param GpioWriter $gpioWriter
     * @param GpioReader $gpioReader
     */
    public function __construct(
        Sensor $sensor,
        ModeResolver $modeResolver,
        GpioWriter $gpioWriter,
        GpioReader $gpioReader
    ) {
        $this->sensor = $sensor;
        $this->modeResolver = $modeResolver;
        $this->gpioWriter = $gpioWriter;
        $this->gpioReader = $gpioReader;
    }

    /**
     * Execute the console command.
     * Run every minute
     * @throws \Exception
     */
    public function handle()
    {
        $targetTemperature = $this->modeResolver->getTargetTemperature();
        $currentTemperature = $this->sensor->getTemperatureFormatted();

        $isMaxTemperatureReached = $this->maxTemperatureReached($targetTemperature, $currentTemperature);

        if ($this->isHeatingActive() && $isMaxTemperatureReached) {
            $this->turnOffHeating();
        } elseif ($targetTemperature > $currentTemperature) {
            $this->turnOnHeating();
        }
    }

    /**
     * @return bool
     */
    protected function isHeatingActive(): bool
    {
        return $this->gpioReader->isPinActive();
    }

    /**
     * @return void
     */
    protected function turnOnHeating()
    {
        $this->gpioWriter->turnOn();
    }

    /**
     * @return void
     */
    protected function turnOffHeating()
    {
        $this->gpioWriter->turnOff();
    }

    /**
     * Difference on 0.5 is needed to avoid toggling heating too often
     *
     * @param float $targetTemperature
     * @param float $currentTemperature
     * @return bool
     */
    protected function maxTemperatureReached(float $targetTemperature, float $currentTemperature): bool
    {
        return $targetTemperature + 0.5 < $currentTemperature;
    }
}
