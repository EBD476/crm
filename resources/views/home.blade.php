@extends('layouts.app')

@section('content')


    {{--<div class="logo">--}}
        {{--<h4><a href="index.html">Admin <strong>Panel</strong></a></h4>--}}
    {{--</div>--}}



    <div class="wrap main-content" data-scrollbar>
        <div class="content" @if (!isset($homeData)) style="display: grid;align-items: center;height: 60vmin" @endif>
            {{--<h2 class="page-title"><span class="fw-semi-bold">Responsive</span> Grid <small>Fully responsive layout</small></h2>--}}

            @hasanyrole('role_su|role_admin')
            <div class="table-responsive" style="font-size: 13px;color: #65767c">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Home Data</th>
                        <th>Operation</th>
                    </tr>
                    </thead>

                    <tbody>
                    {{--@foreach ($roles as $role)--}}
                        {{--<tr>--}}

                            {{--<td>{{ $role->name }}</td>--}}

                            {{--<td>{{  $role->permissions()->pluck('name')->implode(' ') }}</td>--}}{{-- Retrieve array of permissions associated to a role and convert to string --}}
                            {{--<td>--}}
                                {{--<a href="{{ URL::to('roles/'.$role->id.'/edit') }}"--}}
                                   {{--class="btn btn-xs btn-info pull-left" style="margin-right: 3px;">Edit</a>--}}

                                {{--<form action="{{route('roles.destroy', $role->id)}}">--}}
                                    {{--@csrf--}}
                                    {{--@method('DELETE')--}}
                                    {{--<input type="submit" class="btn btn-xs btn-danger" value="DELETE">--}}
                                {{--</form>--}}
                                {{--{!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}--}}
                                {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                                {{--{!! Form::close() !!}--}}

                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    </tbody>

                </table>
            </div>
            @endhasanyrole
            
            @if (!isset($homeData))
            <div class="row text-center" >
                <div class="col-md-12 ">
                    <section class="widget">
                        <header>
                            <h4>                                    
                               {{__('Welcome to Smart Home configuration Panel')}}  <span class="fw-semi-bold"> </span>
                            </h4>
                            Please select add new device
                        </header>
                        <div class="body">

                {{--Define Add new --}}
                            {{--<blockquote class="blockquote-sm">--}}
                                {{--Looks great with <code>.col-md-offset-2</code>--}}
                            {{--</blockquote>--}}
                            {{--<h2 class="page-title">Tables - <span class="fw-semi-bold">Static</span></h2>--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                      {{--<a href="#"  data-toggle="modal" data-target="#myModal2" data-backdrop="static">--}}
                                          {{--<div class="btn-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">--}}
                                            {{--<div class="btn-icon-detail"><i class="glyphicon glyphicon-plus-sign"></i>--}}
                                                {{--<span>Create New </span>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                      {{--</a>--}}
                                        <div class="col-md-4 col-md-offset-4">

                                            <button type="button" class="btn btn-cyan btn-md btn-block "
                                                    data-toggle="modal" data-target="#roomModal" data-backdrop="static">
                                                <i class="glyphicon glyphicon-plus-sign"></i>
                                              {{ __('Create New Home Place')}}
                                            </button>
                                            {{--<p> List of contents </p>--}}
                                            {{--<p> Table row count</p>--}}
                                            {{--<p> Search content</p>--}}
                                            {{--<br><br>--}}
                                            {{--<hr>--}}
                                        </div>
                                    </div>
                                <div class="body">
                                    {{--<table class="table table-striped">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th class="hidden-xs">#</th>--}}
                                            {{--<th>Picture</th>--}}
                                            {{--<th>Description</th>--}}
                                            {{--<th class="hidden-xs">Info</th>--}}
                                            {{--<th class="hidden-xs">Date</th>--}}
                                            {{--<th class="hidden-xs">Size</th>--}}
                                            {{--<th></th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td class="hidden-xs">1</td>--}}
                                            {{--<td>--}}
                                                {{--<img class="img-rounded" src="img/jpeg/1.jpg" alt="" height="50">--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--Palo Alto--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs">--}}
                                                {{--<p class="no-margin">--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Type:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; JPEG</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                                {{--<p>--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Dimensions:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; 200x150</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--September 14, 2012--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--45.6 KB--}}
                                            {{--</td>--}}
                                            {{--<td class="width-150">--}}
                                                {{--<div class="progress progress-sm mt-xs js-progress-animate">--}}
                                                    {{--<div class="progress-bar progress-bar-success" data-width="29%" style="width: 0;"></div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td class="hidden-xs">2</td>--}}
                                            {{--<td>--}}
                                                {{--<img class="img-rounded" src="img/jpeg/2.jpg" alt="" height="50">--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--The Sky--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs">--}}
                                                {{--<p class="no-margin">--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Type:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; PSD</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                                {{--<p>--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Dimensions:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; 2400x1455</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--November 14, 2012--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--15.3 MB--}}
                                            {{--</td>--}}
                                            {{--<td class="width-150">--}}
                                                {{--<div class="progress progress-sm mt-xs js-progress-animate">--}}
                                                    {{--<div class="progress-bar progress-bar-warning" data-width="33%" style="width: 0;"></div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td class="hidden-xs">3</td>--}}
                                            {{--<td>--}}
                                                {{--<img class="img-rounded" src="img/jpeg/3.jpg" alt="" height="50">--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--Down the road--}}
                                                {{--<br>--}}
                                                {{--<span class="label label-danger">INFO!</span>--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs">--}}
                                                {{--<p class="no-margin">--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Type:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; JPEG</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                                {{--<p>--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Dimensions:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; 200x150</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--September 14, 2012--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--49.0 KB--}}
                                            {{--</td>--}}
                                            {{--<td class="width-150">--}}
                                                {{--<div class="progress progress-sm mt-xs js-progress-animate">--}}
                                                    {{--<div class="progress-bar progress-bar-gray" data-width="38%" style="width: 0;"></div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td class="hidden-xs">4</td>--}}
                                            {{--<td>--}}
                                                {{--<img class="img-rounded" src="img/jpeg/4.jpg" alt="" height="50">--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--The Edge--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs">--}}
                                                {{--<p class="no-margin">--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Type:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; PNG</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                                {{--<p>--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Dimensions:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; 210x160</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--September 15, 2012--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--69.1 KB--}}
                                            {{--</td>--}}
                                            {{--<td class="width-150">--}}
                                                {{--<div class="progress progress-sm mt-xs js-progress-animate">--}}
                                                    {{--<div class="progress-bar progress-bar-danger" data-width="17%" style="width: 0;"></div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td class="hidden-xs">5</td>--}}
                                            {{--<td>--}}
                                                {{--<img class="img-rounded" src="img/jpeg/11.jpg" alt="" height="50">--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--Fortress--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs">--}}
                                                {{--<p class="no-margin">--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Type:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; JPEG</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                                {{--<p>--}}
                                                    {{--<small>--}}
                                                        {{--<span class="fw-semi-bold">Dimensions:</span>--}}
                                                        {{--<span class="text-muted">&nbsp; 1452x1320</span>--}}
                                                    {{--</small>--}}
                                                {{--</p>--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--October 1, 2012--}}
                                            {{--</td>--}}
                                            {{--<td class="hidden-xs text-muted">--}}
                                                {{--2.3 MB--}}
                                            {{--</td>--}}
                                            {{--<td class="width-150">--}}
                                                {{--<div class="progress progress-sm mt-xs js-progress-animate">--}}
                                                    {{--<div class="progress-bar" data-width="41%" style="width: 0;"></div>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}

                                    {{--</table>--}}
                                    {{--<div class="clearfix">--}}
                                        {{--<div class="pull-right">--}}
                                            {{--<button class="btn btn-default btn-sm">--}}
                                                {{--Send to ...--}}
                                            {{--</button>--}}
                                            {{--<div class="btn-group">--}}
                                                {{--<button class="btn btn-sm btn-inverse dropdown-toggle" data-toggle="dropdown">--}}
                                                    {{--&nbsp; Clear &nbsp;--}}
                                                    {{--<i class="fa fa-caret-down"></i>--}}
                                                {{--</button>--}}
                                                {{--<ul class="dropdown-menu dropdown-menu-right">--}}
                                                    {{--<li><a href="#">Clear</a></li>--}}
                                                    {{--<li><a href="#">Move ...</a></li>--}}
                                                    {{--<li><a href="#">Something else here</a></li>--}}
                                                    {{--<li class="divider"></li>--}}
                                                    {{--<li><a href="#">Separated link</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<p>Basic table with styled content</p>--}}
                                    {{--</div>--}}
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            @else
                @role('role_user')
                @foreach($homeData as $data)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="box">
                            <div class="icon">
                                <a href="#" data-toggle="modal" data-target="#roomModal"
                                   data-value="{{json_encode($data)}}"
                                   data-id="{{$loop->iteration}}"
                                   data-backdrop="static">
                                    <div data-zlname="room" style="border-radius: 5px"><div data-zl-ovrolling="zl_overlay_test2" style="background: rgb(255, 255, 255); left: 0px; top: -220px; opacity: 0.7; display: block;"></div>
                                        <img src="{{ asset('images/rooms/R'.$data->room_type.'.jpg')}} ">
                                        <a data-zl-popup="link" href="#" data-toggle="modal"  data-target="#roomModal" data-backdrop="static" data-value="{{json_encode($data)}}" data-id="{{$loop->iteration}}" style="left: 88.5px; top: -120px; display: block;"><i class="fa fa-edit" style="color: #5b666d;"> </i></a>
                                        <a data-zl-popup="link2" href="#" data-toggle="modal"  data-target="#confirmModal" data-backdrop="static" data-value="{{json_encode($data)}}" data-id="{{$loop->iteration}}" style="left: 88.5px; top: -120px; display: block;"><i class="fa fa-remove" style="color: #5b666d;"> </i></a>
                                        {{--<a data-zl-popup="link2" href="{{ route('homedata.update', ['homedatum' =>  $loop->iteration]) }}"--}}
                                           {{--style="right: 88.5px; top: -120px; display: block;"--}}
                                           {{--onclick="event.preventDefault();--}}
                                           {{--$('#roomId').val({{$loop->iteration}});--}}
                                           {{--$('#roomData').val(JSON.stringify({{json_encode($data)}}));--}}
                                                     {{--document.getElementById('destroy-room').submit();">--}}
                                            {{--<i class="fa fa-remove" style="color: #5b666d;"> </i>--}}
                                        {{--</a>--}}

                                        <form id="destroy-room" action="{{ route('homedata.update', ['homedatum' =>  $loop->iteration]) }}" method="POST" style="display: none;">
                                          @csrf
                                          @method('PUT')
                                            <input type="hidden" id="roomId" name="roomId">
                                            <input type="hidden" id="roomData" name="roomData">
                                        </form>

                                        {{--<a data-zl-popup="link2" href="{{ route('homedata.destroy', ['id' => $device_code]) }}" style="right: 88.5px; top: -120px; display: block;">--}}
                                            {{--<i class="fa fa-remove" style="color: #5b666d;"> </i>--}}
                                        {{--</a>--}}
                                    </div>
                                     {{--<div style="width: 100%;height: 100%;border-radius: 3px; background: url({{ asset('images/rooms/R'.$data->room_type.'.jpg') }});background-size: cover"></div>--}}
                                </a>
                                {{--<i class="fa fa-building-o"></i>--}}
                            </div>
{{--                            {{dd(json_decode( json_decode($data->home_data)[0])->room_name)}}}--}}
                            <div class="description">
{{--                                {{dd(sizeof(json_decode(json_decode($data)->light_module)))}}--}}
                               <h4>{{$data->room_name}} </h4>
                                <span>Sensor states</span>
                                {{--<span class="key">{{__('Lights')}}</span>--}}

                                        <ul class="overall-stats">
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#lightModal" data-id="{{$loop->iteration}}" data-value="{{isset($data->light_module) ? json_encode($data->light_module) : 0}}">
                                                    <img src="{{ asset('images/light_icon.png') }}" />
                                                        <h5 class="text-center">{{isset($data->light_module) ? sizeof($data->light_module) : 0}}</h5>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#moduleModal" data-id="{{$loop->iteration}}" data-value="{{isset($data->plug_module) ? json_encode($data->plug_module) : 0}}" data-type="2">
                                                    <img src="{{ asset('images/plug_icon.png') }}" />
                                                    <h5 class="text-center">{{isset($data->plug_module) ? sizeof($data->plug_module) : 0}}</h5>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#moduleModal" data-id="{{$loop->iteration}}" data-value="{{isset($data->curtain_module) ? json_encode($data->curtain_module) : 0}}" data-type="3">
                                                    <img src="{{ asset('images/curtain_icon.png') }}" />
                                                    <h5 class="text-center">{{isset($data->curtain_module) ? sizeof($data->curtain_module) : 0}}</h5>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#moduleModal" data-id="{{$loop->iteration}}" data-value="{{isset($data->temp_module) ? json_encode($data->temp_module) : 0}}" data-type="4">
                                                    <img src="{{ asset('images/fan_icon.png') }}" />
                                                    <h5 class="text-center">{{isset($data->temp_module) ? sizeof($data->temp_module) : 0}}</h5>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#moduleModal" data-id="{{$loop->iteration}}" data-value="{{isset($data->irrigation_module) ? json_encode($data->irrigation_module) : 0}}" data-type="5">
                                                    <img src="{{ asset('images/irrigation_icon.png') }}" />
                                                    <h5 class="text-center">{{isset($data->irrigation_module) ? sizeof($data->irrigation_module) : 0}}</h5>
                                                </a>

                                            </li>
                                        </ul>

                                        {{--<div class="value pull-right">--}}
                                            {{--<span class="badge badge-warning"> 10</span>--}}
                                        {{--</div>--}}

                                    {{--<li>--}}
                                        {{--<span class="key">{{__('Plugs')}}</span>--}}
                                        {{--<div class="value pull-right">--}}
                                            {{--<span class="badge badge-default"> 10</span>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<span class="key">{{__('Thermostat')}}</span>--}}
                                        {{--<div class="value pull-right">--}}
                                            {{--<span class="badge badge-success"> 10</span>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<span class="key">{{__('Curtains')}}</span>--}}
                                        {{--<div class="value pull-right">--}}
                                            {{--<span class="badge badge-info"> 10</span>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<span class="key">{{__('Irrigations')}}</span>--}}
                                        {{--<div class="value pull-right">--}}
                                            {{--<span class="badge badge-info"> 10</span>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                            </div>
                        </div>
                    </div>
                @endforeach
                    <a href="#" data-toggle="modal" data-target="#roomModal" data-backdrop="static" data-id="1001">
                      <div class="btn-icon-list col-md-3">
                       <div class="btn-icon-detail"><i class="glyphicon glyphicon-plus-sign"></i>
                    <span>Create New </span>
                    </div>

                    </div>
                    </a>
            @endrole
            @endif
            <div class="hanta-logo-right" style="height : 50px;"> </div>
    </div>

    </div>
    <div class="status-bar clearfix">
        {{--<div class="pull-right">--}}
            {{--<span>status bar</span>--}}
        {{--</div>--}}
    </div>

    <div id="moduleModal" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" style="displaydisplay: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="moduleDataForm" class="form-horizontal" role="form" >
                    @csrf
                    <div class="modal-header modal-gold">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
{{--                        <img class="center-block" src="{{asset('images/light_icon_dark.png')}}"/>--}}
                        <h4 class="modal-title text-center" >{{__('Module Creation')}}</h4>
                    </div>
                    <div class="modal-body">

                        <fieldset>
                            <legend class="section text-center">{{__('Module Information')}}</legend>
                            <table id="module-table2" class="col-md-12">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="normal-field" class="control-label col-sm-2 " >{{__('Module Name')}}</label>
                                            <div class="col-sm-8">
                                                <input name="moduleName[]" type="text" id="normal-field"
                                                       class="form-control" placeholder="{{__('Type module name')}}"
                                                       value="">
                                            </div>

                                            <div class="col-sm-1">
                                                <button class="btn btn-primary add-omodule" data-dismiss=""> <i class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="moduleType" id="moduleType"/>
                                    </td>
                                </tr>


                            </table>
                            <input type="hidden" id="roomId" name="roomId">
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                        <input type="submit" id="btn-save-data2" class="btn btn-primary" value="{{__('Save changes')}}"/>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <div id="lightModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="displaydisplay: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="lightDataForm" class="form-horizontal" role="form" action="{{route('storelight')}}">
                    @csrf
                    <div class="modal-header modal-gold">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <img class="center-block" src="{{asset('images/light_icon_dark.png')}}"/>
                        <h4 class="modal-title text-center" id="myModalLabel2">{{__('Light Creation')}}</h4>
                    </div>
                    <div class="modal-body">

                        <fieldset>
                            <legend class="section text-center">{{__('Light Information')}}</legend>
                            <table id="module-table" class="col-md-12">
                                        {{--@if(isset($homeData->light_module))--}}
                                            {{--@foreach($homeData->light_module as $light_module)--}}
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="normal-field" class="col-sm-2 control-label">  {{__('Light Type')}}</label>
                                                    <div class="col-sm-3">
                                                        <select name="lightType[]" id="state" data-placeholder="{{__('Select light type')}}"
                                                                required="required" class="select2 form-control" >
                                                            <option value="1" selected>Normal</option>
                                                            <option value="2" >Dimmer</option>
                                                            <option value="3" >RGB</option>
                                                        </select>
                                                    </div>

                                                    <label for="normal-field" class="control-label col-sm-2 " >{{__('Light Name')}}</label>
                                                        <div class="col-sm-4">
                                                           <input name="lightName[]" type="text" id="normal-field"
                                                                  class="form-control" placeholder="{{__('Type light name')}}"
                                                                    value="">
                                                        </div>

                                                        <div class="col-sm-1">
                                                            <button class="btn btn-primary add-module" > <i class="fa fa-plus"></i> </button>
                                                        </div>
                                                </div>
                                            </td>
                                        </tr>
                                    {{--@endforeach--}}
                                    {{--@endif--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="normal-field" class="col-sm-2 control-label">  {{__('Light Type')}}</label>--}}
                                                {{--<div class="col-sm-3">--}}
                                                    {{--<select name="lightType[]" id="state" data-placeholder="{{__('Select light type')}}"--}}
                                                            {{--required="required" class="select2 form-control" >--}}
                                                        {{--<option value="1" >Normal</option>--}}
                                                        {{--<option value="2" >Dimmer</option>--}}
                                                        {{--<option value="3" >RGB</option>--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}

                                                {{--<label for="normal-field" class="control-label col-sm-2 " >{{__('Light Name')}}</label>--}}
                                                {{--<div class="col-sm-4">--}}
                                                    {{--<input name="lightName[]" type="text" id="normal-field"--}}
                                                           {{--class="form-control" placeholder="{{__('Type light name')}}">--}}
                                                {{--</div>--}}

                                                {{--<div class="col-sm-1">--}}
                                                    {{--<button class="btn btn-primary add-module" data-dismiss=""> <i class="fa fa-plus"></i> </button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}


                            </table>

                            {{--<div class="form-group">--}}

                                {{--<div class="col-sm-7">--}}

                                  {{----}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <input type="hidden" id="roomId" name="roomId">
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                        <input type="submit" id="btn-save-data" class="btn btn-primary" value="{{__('Save changes')}}"/>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="roomModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="roomDataForm" class="form-horizontal" role="form" >
                    @csrf
                <div class="modal-header modal-gold" style="background: url({{ asset('images/bg6.jpg')}}) no-repeat;height: 150px;background-size: auto">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel2">{{__('Room Creation')}}</h4>
                </div>
                <div class="modal-body">
                        <fieldset>
                            <legend class="section">{{__('Room Information')}}</legend>
                            <div class="form-group">
                                <label for="normal-field" class="col-sm-4 control-label">{{__('Room Type')}}</label>
                                <div class="col-sm-7">
                                    <select name="roomType" id="select2" data-placeholder="{{__('Select room type')}}"
                                            required="required" class="select2 form-control" name="roomType">
                                        @foreach($rooms as $room)
                                            <option value="{{$loop->iteration}}">{{$room}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="normal-field" class="col-sm-4 control-label">{{__('Room Name')}}</label>
                                <div class="col-sm-7">
                                    <input name="roomName" type="text" id="normal-field" class="form-control" placeholder="{{__('Type room name')}}">
                                    <input type="hidden" id="roomId" name="roomId">
                                </div>
                            </div>
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                    <input type="submit" id="btn-save-data" class="btn btn-primary" value="{{__('Save changes')}}"/>
                </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 500px">
                <div class="modal-content">
                    <form id="removeRoomForm" class="form-horizontal" role="form">
                        @csrf
                        <input type="hidden" id="roomId" name="roomId">
                        <input type="hidden" id="roomData" name="roomData">
                    <div class="modal-header" style="background-color: #c51f1a ;height: 60px;background-size: auto">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('Remove Room')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{__('Are you sure to delete this room?')}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                        <input type="submit" class="btn btn-danger" value="{{__('Accept')}}"/>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    {{--<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}

                {{--<div class="modal-header modal-gold">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                    {{--<h4 class="modal-title" id="myModalLabel2">Modal Heading</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<form class="form-horizontal" role="form">--}}
                        {{--<fieldset>--}}
                            {{--<legend class="section">Horizontal form</legend>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="normal-field" class="col-sm-4 control-label">Normal field</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input type="text" id="normal-field" class="form-control" placeholder="May have placeholder">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="hint-field" class="col-sm-4 control-label">--}}
                                    {{--Transparent input--}}
                                {{--</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input type="text" id="transparent-field" class="form-control" placeholder="Stylish, huh??">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="hint-field" class="col-sm-4 control-label">--}}
                                    {{--Label hint--}}
                                    {{--<span class="help-block">Some help text</span>--}}
                                {{--</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input type="text" id="hint-field" class="form-control ">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-4 control-label" for="tooltip-enabled">Tooltip enabled</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input type="text" id="tooltip-enabled" class="form-control"--}}
                                           {{--data-placement="top" data-original-title="Some explanation text here"--}}
                                           {{--placeholder="Hover over me..">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-4 control-label" for="disabled-input">Disabled input</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input type="text" id="disabled-input" class="form-control input-transparent"--}}
                                           {{--disabled="disabled" value="Default value" >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-4 control-label" for="max-length">Max length</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input type="text" id="max-length" maxlength="3"--}}
                                           {{--class="form-control "--}}
                                           {{--placeholder="Max length 3 characters"--}}
                                           {{--data-placement="top" data-original-title="You cannot write more than 3 characters.">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-4 control-label" for="prepended-input">Prepended input</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon"><i class="fa fa-user"></i></span>--}}
                                        {{--<input id="prepended-input" class="form-control input" size="16" type="text" placeholder="Username">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-4 control-label" for="password-field">Password</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon"><i class="fa fa-lock"></i></span>--}}
                                        {{--<input type="password" class="form-control input" id="password-field" placeholder="Password">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-4 control-label" for="appended-input">Appended input</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<input id="appended-input" class="form-control input" size="16" type="text">--}}
                                        {{--<span class="input-group-addon">.00</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-4 control-label" for="combined-input">Combined</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">$</span>--}}
                                        {{--<input id="combined-input" class="form-control input" size="16" type="text">--}}
                                        {{--<span class="input-group-addon">.00</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-4 control-label" for="transparent-input">--}}
                                    {{--Append Transparent--}}
                                {{--</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<input id="transparent-input" class="form-control input" type="text">--}}
                                        {{--<span class="input-group-addon">--}}
                                                {{--<i class="fa fa-camera"></i>--}}
                                            {{--</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</fieldset>--}}
                    {{--</form>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--</div>--}}

            {{--</div><!-- /.modal-content -->--}}
        {{--</div><!-- /.modal-dialog -->--}}
    {{--</div>--}}

@endsection


@push('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(window).load(function() {

            $('[data-zlname = room]').mateHover({
                position: 'y',
                overlayStyle: 'rolling',
                overlayBg: '#fff',
                overlayOpacity: 0.7,
                overlayEasing: 'easeOutCirc',
                rollingPosition: 'top',
                popupEasing: 'easeOutBack',
                popup2Easing: 'easeOutBack'
            });
        });

        Scrollbar.initAll();
        $(".select2").each(function(){
            $(this).select2($(this).data());
        });
    </script>
@endpush