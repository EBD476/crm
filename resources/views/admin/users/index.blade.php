@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="wrap main-content" data-scrollbar>
        <div class="content">

    <div class="col-lg-12 ">
        <h3><i class="fa fa-user" style="font-size:32px;">&nbsp;</i>{{__('User Administration')}}
     
            @role('role_su')
              <a href="{{ route('users.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Add User </a>
                <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h3>
            @endrole
            @role('role_admin')
            <div class="col-md-2 pull-right">
                   <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add User </a>
             </div>
             @endrole
        <hr>
        <div class="user-list col-md-12" style="padding:10px">
        <div class="table-responsive" style="font-size: 13px;color: #65767c">
            <table class="table  table-striped">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Code</th>
                    <th>Date/Time Created</th>
                    @role('role_su')
                        <th>User Roles</th>
                    @endrole
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->device_id }}</td>
                        <td>{{ $user->created_at->format('F d, Y') }}</td>
                        @role('role_su')
                        <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                        @endrole
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-cyan btn-sm color-teal pull-left ripple " style="margin-right: 3px;">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm glyphicon glyphicon-remove  color-red-dark destroy-model ripple"
                                    type="button" data-destroy-url="{{ route('users.destroy', ['id' => $user->id]) }}">

                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        </div>


        </h3>
        </div>
    </div>
@endsection