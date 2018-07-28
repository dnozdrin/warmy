<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Library\Sensor;
use App\Library\ModeResolver;
use App\Library\GpioControl;

class Thermostat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Thermostat:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trigger temperature fetch and a relay toggle';

    /**
     * @var Sensor
     */
    protected $sensor;

    /**
     * @var ModeResolver
     */
    protected $modeResolver;

    /**
     * @var GpioControl
     */
    protected $gpioControl;

    /**
     * Thermostat constructor.
     * @param Sensor $sensor
     * @param ModeResolver $modeResolver
     * @param GpioControl $gpioControl
     */
    public function __construct(Sensor $sensor, ModeResolver $modeResolver, GpioControl $gpioControl)
    {
        parent::__construct();
        $this->sensor = $sensor;
        $this->modeResolver = $modeResolver;
        $this->gpioControl = $gpioControl;
    }

    /**
     * Execute the console command.
     * Run every minute
     * @throws \Exception
     */
    public function handle()
    {
        $mode = $this->modeResolver->findSuitableMode();
        $temperature = $this->sensor->temperatureFormatted();

        if ($mode->target_temperature > $temperature) {
            $this->gpioControl->turnOn();
        } else {
            $this->gpioControl->turnOff();
        }
    }
}
