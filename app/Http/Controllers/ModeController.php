<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Mode;
use App\Day;
use App\Library\ModeResolver;

/**
 * Class ModeController
 * @package App\Http\Controllers
 */
class ModeController extends Controller
{
    /**
     * @var ModeResolver
     */
    protected $modeResolver;

    /**
     * MainController constructor.
     * @param ModeResolver $modeResolver
     */
    public function __construct(ModeResolver $modeResolver)
    {
        $this->modeResolver = $modeResolver;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeMode = $this->modeResolver->findSuitableMode();

        return view('templates.mode.index',
            [
                'modes' => Mode::orderBy('enabled', 'desc')->get(),
                'active' => $activeMode->id ?? 0,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.mode.create',
            [
                'days' => Day::all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'target_temperature' => 'required',
            'period_start' => 'required',
            'period_end' => 'required',
        ]);

        $mode = new Mode;
        $mode->title = $request->get('title');
        $mode->enabled = $request->get('enabled') ?? 0;
        $mode->target_temperature = $request->get('target_temperature');
        $mode->period_start = $request->get('period_start');
        $mode->period_end = $request->get('period_end');
        $mode->save();
        $mode->days()->sync($request->get('days'));

        Session::flash('success', __('strings.mode_saved', ['mode' => $mode->title]));
        return redirect()->route('modes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('templates.mode.edit',
            [
                'mode' => Mode::findOrFail($id),
                'days' => Day::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'target_temperature' => 'required',
            'period_start' => 'required',
            'period_end' => 'required',
        ]);

        /** @var \App\Mode $mode */
        $mode = Mode::findOrFail($id);
        $mode->title = $request->get('title');
        $mode->enabled = $request->get('enabled') ?? 0;
        $mode->target_temperature = $request->get('target_temperature');
        $mode->period_start = $request->get('period_start');
        $mode->period_end = $request->get('period_end');
        $mode->days()->sync($request->get('days'));

        $mode->save();
        Session::flash('success', __('strings.mode_updated', ['mode' => $mode->title]));

        return redirect()->route('modes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /** @var \App\Mode $mode */
        $mode = Mode::findOrFail($id);
        $title = $mode->title;
        $mode->forceDelete();

        Session::flash('success', __('strings.mode_deleted', ['mode' => $title]));
        return redirect()->route('modes.index');
    }
}
