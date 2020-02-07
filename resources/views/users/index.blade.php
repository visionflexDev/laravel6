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
    <h3 class="card-title">Users Management</h3>
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
        <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"> Create New User</a>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered" id="users_table">
      <thead>
       <tr>
         <th>No</th>
         <th>Name</th>
         <th>Email</th>
         <th>Roles</th>
         <th width="280px">Action</th>
       </tr>
      </thead>
       <tbody>
       @foreach ($data as $key => $user)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
                 <label class="badge badge-success">{{ $v }}</label>
              @endforeach
            @endif
          </td>
          <td>
             <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
             <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
              {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>


    {!! $data->render() !!}
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<p class="text-center text-primary"><small>izoolz.com</small></p>
@endsection

@section('js')
    <script> 
        $(document).ready( function () {
              $('#users_table').DataTable();
          } );
    </script>
@stop


















