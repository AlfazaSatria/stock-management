@extends('layouts.app', ['title' => $title])
@section('title', 'Home')
@section('action')
{{-- <div class="card-header-action dropdown" style="float:right">
  <div class="btn-group">
    <button type="button" class="btn btn-danger change">This Month</button>
    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
      <span class="sr-only">Toggle Dropdown</span>
      <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <li class="dropdown-title">Choose Period</li>
        <li><a href="#" class="dropdown-item filter" ids="2">This Week</a></li>
        <li><a href="#" class="dropdown-item filter active" ids="3">This Month</a></li>
        <li><a href="#" class="dropdown-item filter" ids="4">This Year</a></li>
      </ul>
  </div>
</div> --}}
@endsection
@section('content')

<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-box"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Product</h4>
        </div>
        <div class="card-body">
          {{$product}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-chart-line"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Current Stock</h4>
        </div>
        <div class="card-body">
        {{$current_stock}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-truck-loading"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Stock In</h4>
        </div>
        <div class="card-body">
          {{$stock_in}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-box-open"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Stock Out</h4>
        </div>
        <div class="card-body">
          {{$stock_out}}
        </div>
      </div>
    </div>
  </div>
</div>


@endsection