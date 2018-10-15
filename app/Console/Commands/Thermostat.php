<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Library\HeaterControl;

/**
 * Class Thermostat
 * @package App\Console\Commands
 */
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
     * @var HeaterControl
     */
    protected $heaterControl;

    /**
     * Thermostat constructor.
     * @param HeaterControl $heaterControl
     */
    public function __construct(HeaterControl $heaterControl)
    {
        parent::__construct();
        $this->heaterControl = $heaterControl;
    }

    /**
     * Execute the console command.
     * Run every minute
     * @throws \Exception
     */
    public function handle()
    {
        $this->heaterControl->handle();
    }
}
