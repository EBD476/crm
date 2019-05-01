@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

<div class="wrap main-content" data-scrollbar>
    <div class="content">
        <form action="{{ route('users.update',[$user->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-12">

                {{--  <h3><i class='fa fa-user-plus'></i> Edit {{$user->name}}</h3>
                <hr> --}}
                <section class="panel">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#home-2">
                                    <i class="fa fa-user"></i>
                                    General
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#about-2" aria-expanded="true">
                                    <i class="fa fa-key"></i>
                                    Password
                                </a>
                            </li>
                            @role('role_su')
                            <li class="">
                                <a data-toggle="tab" href="#contact-2" aria-expanded="false">
                                    <i class="fa fa-cogs"></i>
                                    Options
                                </a>
                            </li>
                            @endrole
                        </ul>
                    </header>
                    <div class="panel-body">


                        <div class="tab-content">
                            <div id="home-2" class="tab-pane active">
                                {{--        {{ Form::open(array('url' => 'users')) }}--}}

                                <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name"
                                        value="{{$user->name}}">
                                </div>

                                {{--<div class="form-group label-floating">--}}
                                {{--<label class="control-label">Email</label>--}}
                                {{--<input type="text" class="form-control" name="email" placeholder="Email">--}}
                                {{--</div>--}}

                                <div class="form-group label-floating">
                                    <label class="control-label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                        value="{{$user->username}}">
                                </div>

                                {{--<div class="form-group label-floating">--}}
                                {{--<label class="control-label">Email</label>--}}
                                {{--<input type="text" class="form-control" name="email" placeholder="Email">--}}
                                {{--</div>--}}

                                <div class="form-group label-floating">
                                    <label class="control-label">Device ID</label>
                                    <input type="text" class="form-control" name="device_id" placeholder="Device ID"
                                        value="{{$user->device_id}}">
                                </div>

                                {{--<div class="form-group">--}}
                                {{--{{ Form::label('name', 'Name') }}--}}
                                {{--{{ Form::text('name', null, array('class' => 'form-control')) }}--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                {{--{{ Form::label('email', 'Email') }}--}}
                                {{--{{ Form::email('email', null, array('class' => 'form-control')) }}--}}
                                {{--</div>--}}

                                @role('role_su')
                                <h5><b>Give Role</b></h5>

                                <div class='form-group'>

                                    @foreach ($roles as $role)
                                    <input type="checkbox" name="roles[]" value="{{$role->id}}" 
                                          @if ($user->roles->contains($role)) checked @endif >
                                    <label class="control-label">{{ucfirst($role->name)}}</label>
                                    {{--{{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}--}}
                                    {{--{{ Form::label($role->name, ucfirst($role->name)) }}<br>--}}

                                    @endforeach
                                </div>
                                @endrole

                                {{--  <input type="submit" class="btn btn-block btn-primary" value="Save">  --}}

                            </div>
                            <div id="about-2" class="tab-pane">
                                    <h3>Change User Password</h3>
                                    <hr>
                                {{--<div class="form-group">--}}
                                {{--{{ Form::label('password', 'Password') }}<br>--}}
                                {{--{{ Form::password('password', array('class' => 'form-control')) }}--}}

                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                {{--{{ Form::label('password', 'Confirm Password') }}<br>--}}
                                {{--{{ Form::password('password_confirmation', array('class' => 'form-control')) }}--}}

                                {{--</div>--}}

                                <div class="form-group label-floating">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                                <div class="form-group label-floating">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Confirm Password">
                                </div>

                                {{--  <input type="submit" class="btn btn-block btn-primary" value="Edit">  --}}
                            </div>

                            @role('role_su')    
                            <div id="contact-2" class="tab-pane">
                                <h3>Active Options</h3>
                                <hr>
                                <ul>
                                    <li>
                                        <input type="checkbox" name="options[]" value="1" @if ($options[0]) checked
                                            @endif>
                                        <label class="control-label"> Control </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="2" @if ($options[1]) checked
                                            @endif>
                                        <label class="control-label"> Scenario </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="3" @if ($options[2]) checked
                                            @endif>
                                        <label class="control-label"> Security </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="4" @if ($options[3]) checked
                                            @endif>
                                        <label class="control-label"> Camera </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="5" @if ($options[4]) checked
                                            @endif">
                                        <label class="control-label"> Video Doorphone  </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="6" @if ($options[5]) checked
                                            @endif>
                                        <label class="control-label"> Music </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="7" @if ($options[6]) checked
                                            @endif>
                                        <label class="control-label"> Eshop </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="8" @if ($options[7]) checked
                                            @endif>
                                        <label class="control-label"> Elevator </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="9" @if ($options[8]) checked
                                            @endif>
                                        <label class="control-label"> Voice </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="10" @if ($options[9]) checked
                                            @endif>
                                        <label class="control-label"> Monitoring </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="11" @if ($options[10]) checked
                                            @endif>
                                        <label class="control-label"> Internet </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="options[]" value="12 @if ($options[11]) checked
                                            @endif>
                                        <label class="control-label"> SMS </label>
                                    </li>
                                </ul>

                            </div>
                            @endrole
                        </div>

                </section>
            </div>

            <div class="col-md-3 pull-right">
                <input type="submit" class="btn btn-block btn-primary ripple" value="Save Settings">
            </div>
            {{--{{ Form::submit('Add', array('class' => 'btn btn-primary')) }}--}}

            {{--{{ Form::close() }}--}}

        </form>

    </div>
</div>

@endsection
