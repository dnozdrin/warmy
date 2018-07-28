@extends('layouts.app')

@section('title', __('strings.modes_list'))

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">@lang('strings.modes_list'):</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($modes as $mode)
                        <li id="mode-{{ $mode->id }}" class="list-group-item d-flex justify-content-between align-items-center {{$mode->enabled === 1 ? ($mode->id === $active ? 'list-group-item-warning' : '') : 'list-group-item-secondary' }}">
                            <span>{{ $mode->title }}</span>
                            <div class="justify-content-between">
                                <a class="btn btn-danger btn-sm" href="{{ route('modes.edit', $mode->id) }}" role="button">@lang('strings.edit_button')</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <hr>
                <a class="btn btn-success btn-sm" role="button" href="{{ route('modes.create', $mode->id) }}">@lang('strings.add_button')</a>
            </div>
        </div>
    </div>
@endsection
