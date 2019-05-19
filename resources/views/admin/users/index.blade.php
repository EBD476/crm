@extends('layouts.app')

@section('title', '| Users')

@section('content')
@include('partials.notify')
<div class="wrap main-content" data-scrollbar>
    <div class="content" style="padding:10px 0 0 0">

    <div class="col-lg-12 " style="padding: 0">
        <div class="user-list-header">
        <h4><i class="fa fa-user" style="font-size:26px;">&nbsp;</i>{{__('User Administration')}}
     
            @role('role_su')
              <a href="{{ route('users.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Add User </a>
                <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h4>
            @endrole
        </div>            
            @role('role_admin')
            <div class="col-md-2 pull-right">
                   <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add User </a>
             </div>
             @endrole      
        <div class="user-list col-md-12" style="padding:10px 0 0 0">
        <div class="table-responsive" style="font-size: 13px;color: #65767c">
            <div class="fresh-table  toolbar-color-azure">
                    <div class="toolbar">
                        {{-- <button id="alertBtn" class="btn btn-default">Alert</button> --}}
                     </div>        
            <table  id="fresh-table" class="table  table-striped">
                <thead>
                    <th data-field="id">ID</th>
                    <th data-field="name" data-sortable="true">Name</th>
                    <th data-field="username" data-sortable="true">Username</th>
                    <th data-field="code" data-sortable="true">Code</th>
                    <th data-field="time" data-sortable="true">Date/Time Created</th>
                    @role('role_su')
                        <th>User Roles</th>
                    @endrole
                    <th data-formatter="operateFormatter" data-events="operateEvents">Operations</th>
                </thead>

                <tbody>
                @foreach ($users as $user)
                @if ($user->roles()->pluck('name')->implode(' ') == 'role_user')
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->device_id }}</td>
                        <td>{{ $user->created_at->format('F d, Y') }}</td>
                        @role('role_su')
                        <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                        @endrole
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-cyan btn-sm color-teal pull-left ripple" style="margin-right: 3px;">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm glyphicon glyphicon-remove  color-red-dark destroy-model ripple"
                                    type="button" data-destroy-url="{{ route('users.destroy', ['id' => $user->id]) }}">
                            </button>
                        </td>
                    </tr>     
                    @endif  
                @endforeach
                </tbody>

            </table>
                </div>
        </div>
        </div>


        </h3>
        </div>
    </div>

    {{-- Confirm remove modal --}}
    <div class="remodal rounded-soft" data-remodal-id="modal">
        <button data-remodal-action="close" class="remodal-close"></button>
        <h1>Warning</h1>
        <p>
         Are you sure to delete ?
        </p>
        <br>
        <button data-remodal-action="cancel" class="btn2 btn-danger-red">Cancel</button>
        <button data-remodal-action="confirm" class="btn2 btn-primary">OK</button>
      </div>
@endsection

 @push('scripts')
 <script src="{{ asset('js/bootstrap-table.js') }}"></script>
 <script src="{{ asset('js/remodal.min.js') }}"></script>
 <script>
      var $table = $('#fresh-table');

      $().ready(function(){
      $table.bootstrapTable({
                toolbar: ".toolbar",

                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                striped: true,
                pageSize: 8,
                pageList: [8,10,25,50,100],

                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..."
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                }
            });

            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });

            $('.destroy-model').on('click', function (e) {
                        e.preventDefault();
                        var modal = $('[data-remodal-id=modal]').remodal();
                        modal.open();
            });

            window.operateEvents = {    
            'click .remove': function (e, value, row, index) {
                var modal = $('[data-remodal-id=modal]').remodal();
                    modal.open();

                $('[data-remodal-action=cancel').on('click',function(){
                    return;
                });

                var url = jQuery(this).data('destroy-url');
                $('[data-remodal-action=confirm').on('click',function(){                                        
                  
                    var token = jQuery('meta[name="csrf-token"]').attr('content');
                    var html = '<form method="post" action="' + url + '">' +
                        '<input type="hidden" name="_token" value="'+ token +'" >' +
                        '<input type="hidden" name="_method" value="DELETE" >' +
                        '</form>';
                         var form = jQuery(html);
                        jQuery('body').append(form);
                        setTimeout(function () {
                            form.submit()
                        }, 100);

                });
               
            }
           };

   

            
        });

        function operateFormatter(value, row, index) {
            return [
               ' <a href="{{ url("/users")}}/'+ row.id+'/edit" class="btn btn-cyan btn-sm color-teal pull-left ripple" style="margin-right: 3px;"><i class="glyphicon glyphicon-edit"></i></a>',
               ' <button class="btn btn-danger btn-sm glyphicon glyphicon-remove  color-red-dark destroy-model ripple remove"  data-destroy-url="{{ url("/users")}}/'+ row.id+'" type="button" ></button>'
            ].join('');
        }


     </script>

@endpush 
