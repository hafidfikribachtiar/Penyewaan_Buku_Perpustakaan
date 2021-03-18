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
    <form action="{{url('admin/books/detail')}}" method="POST">
      @csrf
    <strong><i class="fas fa-book mr-1"></i> Title</strong>

    <p class="text-muted"> {{ $title }} </p>

    <hr>

    <strong><i class="fas fa-th mr-1"></i> Description</strong>

    <p class="text-muted">{{ $description }}</p>

    <hr>

    <strong><i class="fas fa-pencil-alt mr-1"></i> Price</strong>
    <p class="text-muted">{{ $price }}</p>

    <div class="group-form-mb-5">
    <a href="{{ url('admin/books/') }}" class="btn btn-secondary">Cancel</a>
        <!-- /.card -->
  <!-- /.card-body -->
</div>

@endsection