@extends('layouts.app')

@section('title', 'Create form')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">@lang('strings.modes_list'):</div>
            <div class="card-body">
                {!! Form::open(['route' => ['modes.store'], 'method' => 'POST']) !!}
                <div class="row">
                    <div class="col">
                        {{ Form::label('title', __('strings.title_label')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" name="enabled" id="enabled" value="1" checked>
                                <label class="custom-control-label" for="enabled">@lang('strings.enabled_label')</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="target_temperature">@lang('strings.target_temperature')</label>
                    <h2>+<span id="t_value">16</span>&deg;C</h2>
                    <input type="range" min="16" max="28" step="0.5" value="16" class="custom-range" id="target_temperature" name="target_temperature">
                </div>
                <div class="form-group">
                    @foreach ($days as $day)
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" name="days[]" id="day-{{$day->identifier}}" value="{{$day->identifier}}">
                            <label class="custom-control-label" for="day-{{$day->identifier}}">@lang('strings.day_' . $day->identifier)</label>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('period_start', __('strings.start_label')) }}
                            {{ Form::text('period_start', null, ["class" => 'timepicker form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('period_end', __('strings.end_label')) }}
                            {{ Form::text('period_end', null, ["class" => 'timepicker form-control']) }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-secondary" href="{{ route('modes.index') }}" role="button">@lang('strings.cancel_button')</a>
                            </div>
                            <div class="col">
                                {{ Form::submit(__('strings.save_button'), ['class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection