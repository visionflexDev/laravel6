@extends('adminlte::page')

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Dashboard</h3>
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="badge badge-primary">Label</span>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    Welcome <strong>{{ Auth::user()->name }}</strong>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
