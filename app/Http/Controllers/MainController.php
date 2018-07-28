<?php

namespace App\Http\Controllers;

use App\Library\Sensor;
use App\Library\ModeResolver;

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
     * MainController constructor.
     * @param Sensor $sensor
     * @param ModeResolver $modeResolver
     */
    public function __construct(Sensor $sensor, ModeResolver $modeResolver)
    {
        $this->sensor = $sensor;
        $this->modeResolver = $modeResolver;
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
            'temperature' => $this->sensor->temperatureFormatted(),
            'mode' => $mode,
        ]);
    }
}
