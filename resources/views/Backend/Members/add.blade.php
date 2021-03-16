@extends('layout.app')
@section('content')

<div class="content-wrapper">
<section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create Members</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

        <form action="{{url('admin/members/save')}}" method="POST">
          @csrf

          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" id="inputName" class="form-control"
                                 name="title" placeholder="Title" 
                                 value="{{ old('title') }}">
            </div>
            <div class="form-group">
              <label for="inputClientCompany">Phone</label>
              <input type="number" id="inputClientCompany" class="form-control"
                        name="phone" placeholder="Phone" 
                        value="{{ old('phone') }}">
            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <textarea id="inputAddress" class="form-control" rows="4"
                     name="address" placeholder="Address" 
                     value="{{ old('address') }}"></textarea>
            </div>
            <div class="form-group">
                <label for="inputClientCompany">Email</label>
                <input type="inputemail" id="inputEmail" class="form-control"
                       name="email" placeholder="Email" 
                       value="{{ old('email') }}">
              </div>
          </div>
          <!-- /.card-body -->
        </div>
        <a href="#" class="btn btn-secondary">Cancel</a>
        <!-- /.card -->
        <div class="row">
          <div class="col-12 float-right">
            <input type="submit" value="Create new Porject" class="btn btn-success float-right-mb-3">
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