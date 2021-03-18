@extends('layout.app')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Book Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">books categories</a></li>
            <li class="breadcrumb-item active">slide 1</li>
          </ol>
        </div><!-- /.col -->
        <hr class="my-4">     
          <a href="books/add" class="btn btn-primary">
            Create Book Categories</a>  
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Books Data</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Created_at</th>
                <th>Update_at</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              

              <?php $no = 1; ?>
              @foreach ($bookcategories as $kat => $value)
              
              
              <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $value->created_at }}</td>
              <td>{{ $value->update_at }}</td>
              <td>{{ $value->name }}</td>
              
              <td>
                <a href="{{ url('admin/books/edit/'.$value->id) }}" class="btn btn-success btn-sm"><i class="fas fa-cog"></i></a>
                <a href="{{ url('admin/books/detail/'.$value->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <a href="{{ url('admin/books/delete/'.$value->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
              
              </td>
              {{-- <td>
              
              
              <a href="{{ url('admin/books/edit/'.$kat->id) }}" class="badge badge-primary">Edit</a>
              
              
              <a href="{{ url('admin/books/delete/'.$kat->id) }}" class="badge badge-danger">Hapus</a>
              
              
              </td> --}}
              
              
              </tr>
              
              
              @endforeach
            </tbody>
          </table>
        </div>

@endsection