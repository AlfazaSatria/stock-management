@extends('layouts.app', ['title' => $title])
@section('title', 'Home')
@section('action')
<div class="card-header-action dropdown" style="float:right">
  <div class="btn-group">
    <button type="button" class="btn btn-danger change">Bulan ini</button>
    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
      <span class="sr-only">Toggle Dropdown</span>
      <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <li class="dropdown-title">Pilih Periode</li>
        <li><a href="#" class="dropdown-item filter" ids="1">Hari ini</a></li>
        <li><a href="#" class="dropdown-item filter" ids="2">Minggu ini</a></li>
        <li><a href="#" class="dropdown-item filter active" ids="3">Bulan ini</a></li>
        <li><a href="#" class="dropdown-item filter" ids="4">Tahun ini</a></li>
      </ul>
  </div>
</div>
@endsection
@section('content')

<div class="card">
  <div class="card-header">
    <h4>Stock Management</h4>
  </div>
  <div class="card-body">
    <p>
      Admin Tools Stock
    </p>
  </div>
  <div class="card-footer bg-whitesmoke">
    Stock Admin
  </div>
</div>



@endsection