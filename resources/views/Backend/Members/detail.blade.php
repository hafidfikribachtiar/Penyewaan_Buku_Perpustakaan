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
    <form action="{{url('admin/members/detail')}}" method="POST">
      @csrf
    <strong><i class="fas fa-book mr-1"></i> Name</strong>

    <p class="text-muted"> {{ $name }} </p>

    <hr>

    <strong><i class="fas fa-th mr-1"></i> Phone</strong>

    <p class="text-muted">{{ $phone }} </p>

    <hr>

    <strong><i class="fas fa-th mr-1"></i> Address</strong>

    <p class="text-muted">{{ $address }} </p>

    <hr>

    <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>

    <p class="text-muted"> {{ $email }} </p>
      
    <div class="group-form-mb-5">
    <a href="{{ url ('admin/members')}}" class="btn btn-secondary">Cancel</a>
        <!-- /.card -->
  </div>
  <!-- /.card-body -->
</div>

@endsection