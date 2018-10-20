<?php

namespace App\Http\Controllers;

use App\Library\Sensor;
use App\Library\ModeResolver;
use App\Library\Gpio\GpioReader;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
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
     * @var GpioReader
     */
    protected $gpioReader;

    /**
     * MainController constructor.
     * @param Sensor $sensor
     * @param ModeResolver $modeResolver
     * @param GpioReader $gpioReader
     */
    public function __construct(
        Sensor $sensor,
        ModeResolver $modeResolver,
        GpioReader $gpioReader
    ) {
        $this->sensor = $sensor;
        $this->modeResolver = $modeResolver;
        $this->gpioReader = $gpioReader;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function __invoke()
    {
        $mode = $this->modeResolver->findSuitableMode();

        return view('templates.main.index', [
            'time' => date('H:i'),
            'temperature' => $this->sensor->getTemperatureFormatted(),
            'mode' => $mode,
            'isGpioPinActive' => $this->gpioReader->isPinActive(),
        ]);
    }
}
