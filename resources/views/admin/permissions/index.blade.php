@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

    <div class="wrap main-content" data-scrollbar>
        <div class="content">
            <div class="col-lg-12">
                <h3><i class="fa fa-key"  style="font-size:32px;">&nbsp;</i>Available Permissions

                    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h3>
                <hr>
                <div class="table-responsive" style="font-size: 13px;color: #65767c">
                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th>Permissions</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}"
                                       class="pull-left" style="margin-right: 3px;">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>

                                    <form action="{{route('permissions.destroy', $permission->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn  btn-xs btn-danger" value="DELETE">
                                    </form>

                                    {{--{!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}--}}
                                    {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                                    {{--{!! Form::close() !!}--}}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ URL::to('permissions/create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Add Permission</a>

            </div>
        </div>
    </div>
@endsection