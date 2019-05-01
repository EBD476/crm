@extends('layouts.app')

@section('title', '| Settings')

@section('content')

    <div class="wrap main-content" data-scrollbar>
        <div class="content">
            <div class="col-lg-12 ">
                {{--<div class="panel">--}}
                <div class='col-lg-6 '>

                    <h4><i class='fa fa-user-plus'></i> Edit {{$user->name}}</h4>
                    <hr>

                    <form action="{{ route('users.update',[$user->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        {{--<div class="form-group label-floating">--}}
                            {{--<input type="password" class="form-control" name="password" placeholder="Old Password">--}}
                        {{--</div>--}}

                        <div class="form-group label-floating">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>

                        <div class="form-group label-floating">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                        </div>

                        <input type="submit" class="btn btn-block btn-primary" value="Edit">
                    </form>

                </div>
                {{--</div>--}}
            </div>
        </div>
@endsection