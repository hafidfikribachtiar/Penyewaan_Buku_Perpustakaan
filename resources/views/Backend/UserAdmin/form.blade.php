@extends('layout.app')
@section('content')

<div class="content-wrapper">
<section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create User Admin</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

        <form action="{{ $form }}" method="POST">
          <input type='hidden' name='id' value='{{ isset($row) ? $row->id : null }}'/>
          @csrf

          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" id="inputName" class="form-control"
                                 name="name" placeholder="Name" 
                                 value="{{ isset($row) ? $row->name : null }}">
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" id="inputEmail" class="form-control"
                                    name="email" placeholder="Email" 
                                    value="{{ isset($row) ? $row->email : null }}">                      
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" id="inputPassword" class="form-control"
                            name="password" placeholder="Kosongkan Jika Tidak Di Isi">                       
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <a href="{{url('/admin/useradmin/')}}" class="btn btn-secondary">Cancel</a>
        <!-- /.card -->
        <div class="row">
          <div class="col-12 float-right">
            <input type="submit" value="Save" class="btn btn-success float-right-mb-3">
        </div>
        </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    
      </div>
    </div>
  </section>

  @endsection