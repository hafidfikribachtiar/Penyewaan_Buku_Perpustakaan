@extends('layout.app')
@section('content')

<div class="content-wrapper">
  <div class="container">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Transactions</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">transactions</a></li>
            <li class="breadcrumb-item active">slide 1</li>
          </ol>
        </div><!-- /.col -->
        <hr class="my-4">     
          <a href="transactions/add" class="btn btn-primary">
            Create Transactions</a>  
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Transactions</h3>

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
        <div class="card-body table-responsive p-0">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Trans No</th>
                <th>Grand Total</th>
                <th>Created By</th>
              </tr>
            </thead>
            <tbody>
              

                <?php $no = 1; ?>
                @foreach ($transactions as $kat)
                
                
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $kat->trans_no }}</td>
                <td>{{ $kat->grand_total }}</td>
                <td>{{ $kat->created_by }}</td>
                
                <td>
                  <a href="{{ url('admin/transactions/edit/'.$kat->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="{{ url('admin/transactions/detail/'.$kat->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                  <a href="{{ url('admin/transactions/delete/'.$kat->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
        {{ $transactions->links() }}
@endsection