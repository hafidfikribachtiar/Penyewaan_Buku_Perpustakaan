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
    <strong><i class="fas fa-book mr-1"></i> Title</strong>

    <p class="text-muted"> Programming </p>

    <hr>

    <strong><i class="fas fa-map-marker-alt mr-1"></i> Description</strong>

    <p class="text-muted">Malibu, California</p>

    <hr>

    <strong><i class="fas fa-pencil-alt mr-1"></i> Price</strong>

    <p class="text-muted">
      <span class="tag tag-danger">UI Design</span>
      <span class="tag tag-success">Coding</span>
      <span class="tag tag-info">Javascript</span>
      <span class="tag tag-warning">PHP</span>
      <span class="tag tag-primary">Node.js</span>
    </p>

  </div>
  <!-- /.card-body -->
</div>

@endsection