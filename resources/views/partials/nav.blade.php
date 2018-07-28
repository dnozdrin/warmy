<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/"><img src="{{ asset('images/warmy.png') }}" width="30" height="30" class="d-inline-block align-top mr-2" alt="@lang('strings.app_name')">@lang('strings.app_name')</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="@lang('strings.toggle_nav')">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/"> <span class="sr-only">(@lang('strings.nav_current'))</span>@lang('strings.nav_main')</a>
            </li>
            <li class="nav-item {{ Request::is('/modes') ? 'active' : '' }}">
                <a class="nav-link" href="/modes">@lang('strings.nav_modes')</a>
            </li>
            {{--
            <li class="nav-item {{ Request::is('/stats') ? 'active' : '' }}">
                <a class="nav-link" href="/stats">@lang('strings.nav_stats')</a>
            </li>
            --}}
        </ul>
    </div>
</nav>
