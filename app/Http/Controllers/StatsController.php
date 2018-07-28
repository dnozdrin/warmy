<?php

namespace App\Http\Controllers;

/**
 * Class StatsController
 * @package App\Http\Controllers
 */
class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('templates.stats.index', []);
    }
}
