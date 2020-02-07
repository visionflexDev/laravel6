@extends('adminlte::page')
@section('title', 'Dashboard')
@section('plugins.Datatables', true)


@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Role Management</h3>
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"> Create New Role</a>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    
    <table class="table table-bordered" id="roles_table">
        <thead>
          <tr>
             <th>No</th>
             <th>Name</th>
             <th width="280px">Action</th>
          </tr>
        </thead>
          <tbody>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


{!! $roles->render() !!}

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<p class="text-center text-primary"><small>izoolz.com</small></p>
@endsection

@section('js')
    <script> 
        $(document).ready( function () {
              $('#roles_table').DataTable();
          } );
    </script>
@stop