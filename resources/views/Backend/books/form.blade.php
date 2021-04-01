@extends('layout.app')
@section('content')

<div class="content-wrapper"> 
  <div class="container">
    <div class="my-2">
  <a href="{{url('/admin/bookcategories')}}" class="btn btn-info float-right-mb-3">Book Categories </a>
  <div class="my-2">
<section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create books</h3>

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
              <label for="inputName">Title</label>
              <input required type="text" id="inputName" class="form-control"
                                 name="title" placeholder="Input Title" 
                                 value="{{ $title }}">
            </div>
            <div class="form-group">
              <label for="inputDescription">Description</label>
              <textarea id="inputDescription" class="form-control" rows="4"
                        name="description" placeholder="Description of Book">{{ $description }}</textarea>
            </div>
            <div class="form-group">
              <label for="inputClientCompany">Price</label>
              <input required type="number" id="inputClientCompany" class="form-control"
                              name="price" placeholder="Input Book Price. E.g:100000 " 
                              value="{{ $price }}">
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        {{-- JANGAN BERTUMPUK --}}
        <a href="{{url('/admin/books/')}}" class="btn btn-secondary">Cancel</a> 
        <!-- /.card -->
        <div class="my-1">
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