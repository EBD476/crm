<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HANTA') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
{{--    <script src="{{ asset('js/jquery.pjax.js') }}" defer></script>--}}
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <script src="{{ asset('js/jquery.easing.1.3.js') }}" defer></script>
    <script src="{{ asset('js/jquery.mate-hover.1-1-min.js') }}" defer></script>

    <!-- common application js -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
    {{--<script src="{{ asset('js/settings.js') }}"></script>--}}

    <!-- Fonts -->
    {{--<link rel="dns-prefetch" href="https://fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    <!-- Styles -->
    <link href="{{ asset('css/mate.hover.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/application.css') }}" rel="stylesheet">
    
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<div class="text-center main-panel-title"><h4>HANTA Device Management</h4></div>
<body class="container" style="width: 85%">

    <div id="app" class="app-content">
        <div class="app-header">
            {{--<div class="image">--}}
                {{--<img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&amp;fm=jpg&amp;h=300&amp;q=75&amp;w=400" alt="...">--}}
            {{--</div>--}}
            <div class="content">
                <div class="author">
                    <a href="#">
                        <img class="avatar border-gray" src="{{ asset('images/user.jpg') }}" alt="...">
                    </a>

                        <h4 class="title"><small>Welcome</small><br>
                        </h4>
                    <h4 class="title">{{ \Auth::user()->username}}</h4>

                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}

                    </form>

                    {{--</a>--}}
                </div>

            </div>

        </div>

        <nav id="sidebar" class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
                <li class="ripple {{ Request::is('home*') ? 'active': '' }}">
                    <a href="/home"><i class="fa fa-home"></i> <span class="name">{{__('Dashboard')}}</span></a>
                </li>
                {{-- @role('role_admin') --}}
                @hasanyrole('role_su|role_admin')
                    <li  class="ripple {{ Request::is('users*') ? 'active': '' }}">
                        <a href="/users"><i class="fa fa-user"></i> <span class="name">{{__('User Management')}}</span></a>
                    </li>
                    @role('role_su')
                    <li  class="ripple {{ Request::is('roles*') ? 'active': '' }}">
                        <a href="/roles"><i class="fa fa-user"></i> <span class="name">{{__('Role Management')}}</span></a>
                    </li>
                    <li  class="ripple {{ Request::is('permissions*') ? 'active': '' }}">
                        <a href="/permissions"><i class="fa fa-user"></i> <span class="name">{{__('Permissions')}}</span></a>
                    </li>
                    @endrole
                @endhasanyrole
                {{-- @endrole --}}
                @role('role_user')
                <li  class="ripple {{ Request::is('setting*') ? 'active': '' }}">
                    <a href="/setting"><i class="fa fa-cog"></i> <span class="name">{{__('Settings')}}</span></a>
                </li>
                @endrole
                {{--<li class="panel ">--}}
                    {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                       {{--data-parent="#side-nav" href="#forms-collapse"><i class="fa fa-pencil"></i> <span class="name">Forms</span></a>--}}
                    {{--<ul id="forms-collapse" class="panel-collapse collapse ">--}}
                        {{--<li class=""><a href="form_account.html">Account</a></li>--}}
                        {{--<li class=""><a href="form_article.html">Article</a></li>--}}
                        {{--<li class=""><a href="form_elements.html">Elements</a></li>--}}
                        {{--<li class=""><a href="form_validation.html">Validation</a></li>--}}
                        {{--<li class=""><a href="form_wizard.html">Wizard</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="panel ">--}}
                    {{--<a class="accordion-toggle collapsed"--}}
                       {{--data-parent="#side-nav" href="config"><i class="fa fa-cogs"></i> <span class="name">Home Config</span></a>--}}
                    {{--<ul id="stats-collapse" class="panel-collapse collapse ">--}}
                        {{--<li class=""><a href="stat_statistics.html">Stats</a></li>--}}
                        {{--<li class=""><a href="stat_charts.html">Charts</a></li>--}}
                        {{--<li class=""><a href="stat_realtime.html">Realtime</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="panel ">--}}
                    {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                       {{--data-parent="#side-nav" href="#ui-collapse"><i class="fa fa-magic"></i> <span class="name">User Interface</span></a>--}}
                    {{--<ul id="ui-collapse" class="panel-collapse collapse ">--}}
                        {{--<li class=""><a href="ui_buttons.html">Buttons</a></li>--}}
                        {{--<li class=""><a href="ui_dialogs.html">Dialogs</a></li>--}}
                        {{--<li class=""><a href="ui_notifications.html">Notifications</a></li>--}}
                        {{--<li class=""><a href="ui_icons.html">Icons</a></li>--}}
                        {{--<li class=""><a href="ui_tabs.html">Tabs</a></li>--}}
                        {{--<li class=""><a href="ui_accordion.html">Accordion</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="panel ">--}}
                    {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                       {{--data-parent="#side-nav" href="#components-collapse"><i class="fa fa-tree"></i> <span class="name">Components</span></a>--}}
                    {{--<ul id="components-collapse" class="panel-collapse collapse ">--}}
                        {{--<li class=""><a href="component_calendar.html">Calendar</a></li>--}}
                        {{--<li class=""><a href="component_maps.html" data-no-pjax>Maps</a></li>--}}
                        {{--<li class=""><a href="component_gallery.html">Gallery</a></li>--}}
                        {{--<li class=""><a href="component_fileupload.html" data-no-pjax>Fileupload</a></li>--}}
                        {{--<li class=""><a href="component_bootstrap.html">Bootstrap</a></li>--}}
                        {{--<li class=""><a href="component_list_groups.html">List Groups</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="panel ">--}}
                    {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                       {{--data-parent="#side-nav" href="#tables-collapse"><i class="fa fa-cog"></i> <span class="name">Tables</span></a>--}}
                    {{--<ul id="tables-collapse" class="panel-collapse collapse ">--}}
                        {{--<li class=""><a href="tables_static.html">Static <sup class="text-danger fw-bold">upd</sup></a></li>--}}
                        {{--<li class=""><a href="tables_dynamic.html">Dynamic</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="panel ">--}}
                    {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                       {{--data-parent="#side-nav" href="#grid-collapse"><i class="fa fa-th"></i> <span class="name">Widgets</span></a>--}}
                    {{--<ul id="grid-collapse" class="panel-collapse collapse ">--}}
                        {{--<li class=""><a href="grid_basic.html">Basic</a></li>--}}
                        {{--<li class=""><a href="grid_live.html">Live</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="panel ">--}}
                    {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                       {{--data-parent="#side-nav" href="#special-collapse"><i class="fa fa-leaf"></i> <span class="name">Special</span></a>--}}
                    {{--<ul id="special-collapse" class="panel-collapse collapse ">--}}
                        {{--<li class=""><a href="special_search.html">Search <sup class="text-warning fw-bold">new</sup></a></li>--}}
                        {{--<li class=""><a href="special_invoice.html">Invoice</a></li>--}}
                        {{--<li class=""><a href="special_inbox.html">Inbox &nbsp; <span class="label label-important">3</span></a></li>--}}
                        {{--<li><a target="_blank" href="login.html">Login</a></li>--}}
                        {{--<li><a target="_blank" href="error.html">Error Page</a></li>--}}
                        {{--<li><a href="landing.html" data-no-pjax>Landing</a></li>--}}
                        {{--<li><a href="../light/index.html" data-no-pjax title="Light Blue Transparent Light version">Light <sup class="text-warning fw-bold">new</sup></a></li>--}}
                        {{--<li><a href="../white/index.html" data-no-pjax title="Light Blue Transparent White version">White <sup class="text-warning fw-bold">new</sup></a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="panel">--}}
                    {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                       {{--data-parent="#side-nav" href="#menu-levels-collapse"><i class="fa fa-folder-open"></i> <span class="name">Menu Levels</span></a>--}}
                    {{--<ul id="menu-levels-collapse" class="panel-collapse collapse">--}}
                        {{--<li><a href="#">Item 1.1</a></li>--}}
                        {{--<li><a href="#">Item 1.2</a></li>--}}
                        {{--<li class="panel">--}}
                            {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                               {{--data-parent="#menu-levels-collapse" href="#sub-menu-1-collapse">Item 1.3</a>--}}
                            {{--<ul id="sub-menu-1-collapse" class="panel-collapse collapse">--}}
                                {{--<li class="panel">--}}
                                    {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                                       {{--data-parent="#sub-menu-1-collapse" href="#sub-menu-3-collapse">Item 2.1</a>--}}
                                    {{--<ul id="sub-menu-3-collapse" class="panel-collapse collapse">--}}
                                        {{--<li><a href="#">Item 3.1</a></li>--}}
                                        {{--<li><a href="#">Item 3.2</a></li>--}}
                                        {{--<li><a href="#">Item 3.3</a></li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Item 2.2</a></li>--}}
                                {{--<li class="panel">--}}
                                    {{--<a class="accordion-toggle collapsed" data-toggle="collapse"--}}
                                       {{--data-parent="#sub-menu-1-collapse" href="#sub-menu-2-collapse">Item 2.3</a>--}}
                                    {{--<ul id="sub-menu-2-collapse" class="panel-collapse collapse">--}}
                                        {{--<li><a href="#">Item 3.4</a></li>--}}
                                        {{--<li><a href="#">Item 3.5</a></li>--}}
                                        {{--<li><a href="#">Item 3.6</a></li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class="visible-xs">
                    <a href="login.html"><i class="fa fa-sign-out"></i> <span class="name">Sign Out</span></a>
                </li>
            </ul>

            {{--<h5 class="sidebar-nav-title">Labels <a class="action-link" href="#"><i class="glyphicon glyphicon-plus"></i></a></h5>--}}
            {{--<!-- some styled links in sidebar. ready to use as links to email folders, projects, groups, etc -->--}}
            {{--<ul class="sidebar-labels">--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<!-- yep, .circle again -->--}}
            {{--<i class="fa fa-circle text-warning"></i>--}}
            {{--<span class="label-name">My Recent</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-circle text-gray"></i>--}}
            {{--<span class="label-name">Starred</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-circle text-danger"></i>--}}
            {{--<span class="label-name">Background</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}

            {{--<h5 class="sidebar-nav-title">Projects</h5>--}}
            {{--<!-- A place for sidebar notifications & alerts -->--}}
            {{--<div class="sidebar-alerts">--}}
            {{--<div class="alert fade in">--}}
            {{--<a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>--}}
            {{--<span class="text-white fw-semi-bold">Sales Report</span> <br>--}}
            {{--<div class="progress progress-xs mt-xs mb-0">--}}
            {{--<div class="progress-bar progress-bar-gray-light" style="width: 16%"></div>--}}
            {{--</div>--}}
            {{--<small>Calculating x-axis bias... 65%</small>--}}
            {{--</div>--}}
            {{--<div class="alert fade in">--}}
            {{--<a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>--}}
            {{--<span class="text-white fw-semi-bold">Personal Responsibility</span> <br>--}}
            {{--<div class="progress progress-xs mt-xs mb-0">--}}
            {{--<div class="progress-bar progress-bar-danger" style="width: 23%"></div>--}}
            {{--</div>--}}
            {{--<small>Provide required notes</small>--}}
            {{--</div>--}}
            {{--</div>--}}
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
