@extends('layout.app')
@section('content')

<div class="content-wrapper">
<section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create Book Categories</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

        <form action="{{ $form }}" method="POST">
          @csrf

          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" id="inputName" class="form-control"
                                 name="name" placeholder="Name" 
                                 value="{{ $name }}">
            
          </div>
        <a href="{{url('/admin/bookcategories/')}}" class="btn btn-secondary">Cancel</a>
        <!-- /.card -->
        <div class="row">
          <div class="my-1">
          <div class="col-12 float-right">
            <input type="submit" value="save" class="btn btn-success float-right-mb-3">
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