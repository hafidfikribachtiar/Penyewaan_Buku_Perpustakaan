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

    <p class="text-muted"> </p>

    <hr>

    <strong><i class="fas fa-th mr-1"></i> Description</strong>

    <p class="text-muted"></p>

    <hr>

    <strong><i class="fas fa-pencil-alt mr-1"></i> Price</strong>

    <p class="text-muted">
      <span class="tag tag-danger">UI Design</span>
      <span class="tag tag-success">Coding</span>
      <span class="tag tag-info">Javascript</span>
      <span class="tag tag-warning">PHP</span>
      <span class="tag tag-primary">Node.js</span>
    </p>
    <div class="group-form-mb-5">
    <a href="{{ url('admin/books/') }}" class="btn btn-secondary">Cancel</a>
        <!-- /.card -->
        <div class="row">
          <div class="col-12 float-right">
            <input type="submit" value="Create new Porject" class="btn btn-success float-right-mb-3">

  </div>
  <!-- /.card-body -->
</div>

@endsection