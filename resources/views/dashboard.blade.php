@extends('partials.main')

@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Personnel</span>
          <span class="info-box-number">
            110
            <small>%</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-arrow-down"></i></span>
        
        <div class="info-box-content">
          <span class="info-box-text">Personnel en baisse</span>
          <span class="info-box-number">20</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->


    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-arrow-down fa-rotate-270" ></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Personnel constant</span>
          <span class="info-box-number">20</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>





    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-arrow-up"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Personnel en progression</span>
          <span class="info-box-number">70</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    
    <!-- /.col -->
  </div>
@endsection