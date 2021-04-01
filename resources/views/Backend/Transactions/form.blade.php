@extends('layout.app')
@section('content')

<div class="content-wrapper">
  <div class="container">
  <div class="my-2">
    <a href="{{url('/admin/transactiondetails')}}" class="btn btn-info float-right-mb-3">Transaction Details</a>
    <div class="my-2">
<section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create Transactions</h3>

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
                <label for="inputClientCompany">Transactions Number</label>
                <input type="number" id="inputClientCompany" class="form-control"
                        name="trans_no" placeholder="Trans No" 
                        value="{{ $trans_no }}">
            </div>
            <div class="form-group">
                <label for="inputName">Grand Total</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radio1">
                  <label class="form-check-label">Success</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radio1" checked>
                  <label class="form-check-label">Not Success</label>
                </div>
              
            </div>
            <div class="form-group">
              <label for="inputName">Created By</label>
              <input type="text" id="inputName" class="form-control"
                     name="created_by" placeholder="Input Created By"
                     value="{{ $created_by }}">
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <a href="{{url('/admin/transactions/')}}" class="btn btn-secondary">Cancel</a>
        <!-- /.card -->
        <div class="row">
          <div class="my-1">
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