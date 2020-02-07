@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Create New Role</h3>
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"> Back</a>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
</div>

  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->
{!! Form::close() !!}










<p class="text-center text-primary"><small>izoolz.com</small></p>
@endsection