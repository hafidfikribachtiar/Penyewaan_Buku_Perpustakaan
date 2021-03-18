@extends('layout.app')
@section('content')

<div class="content-wrapper">
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
              <label for="inputName">Books Name</label>
              <input type="text" id="inputName" class="form-control"
                                 name="booksname" placeholder="BooksName" 
                                 value="{{ $books_name }}">
            </div>
            <div class="form-group">
                <label for="inputClientCompany">Books Price</label>
                <input type="number" id="inputClientCompany" class="form-control"
                       name="booksprice" placeholder="BooksPrice" 
                       value="{{ $books_price }}">
              </div>
            <div class="form-group">
                <label for="inputQuantity">Quantity</label>
                <select id="inputQuantity" class="form-control custom-select">
                  <option>Very Good</option>
                  <option>Good</option>
                  <option>Not Good</option>
                  <option>Bad</option>
                </select>
              </div>
            <div class="form-group">
              <label for="inputClientCompany">Total</label>
              <input type="number" id="inputClientCompany" class="form-control"
                     name="total" placeholder="Total" 
                     value="{{ $total }}">
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <a href="{{url('/admin/transactiondetails/')}}" class="btn btn-secondary">Cancel</a>
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