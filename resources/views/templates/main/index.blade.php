@extends('layouts.app')

@section('title', __('strings.nav_main'))

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('strings.current_conditions')</div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <span>@lang('strings.time')</span>
                                <h1>{{$time}}</h1>
                            </div>
                            <div class="col">
                                <span>@lang('strings.temperature')</span>
                                <h1>+{{$temperature}}&deg;C</h1>
                            </div>
                        </div>
                        @if (empty($mode) !== true)
                            <div class="row">
                                <div class="col">
                                    <span>@lang('strings.mode')</span>
                                    <h2>{{$mode->title}}</h2>
                                </div>
                                <div class="col">
                                    <span>@lang('strings.target_temperature')</span>
                                    <h1>+{{$mode->target_temperature}}&deg;C</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
