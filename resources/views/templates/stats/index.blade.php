@extends('layouts.app')

@section('title', __('strings.nav_main'))

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('strings.stats')</div>
                <div class="card-body">
                    <h1>Statistics here</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
