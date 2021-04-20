@extends('layout.app')
@section('content')

<div class="content-wrapper">
  <div class="container">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Detail</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="{{url('admin/bookcategories/detail')}}" method="POST">
      @csrf
    <strong><i class="fas fa-book mr-1"></i> Name</strong>

    <p class="text-muted"> {{ $name }} </p>
    
    <div class="group-form-mb-5">
    <a href="{{ url('admin/bookcategories/') }}" class="btn btn-secondary">Cancel</a>
        <!-- /.card -->
  <!-- /.card-body -->
</div>

@endsection