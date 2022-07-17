@extends('layouts.app')
@section('title', 'Stocks')
@section('content')

<div class="card">
  <div class="card-header">
    <h4>Update Stock</h4>
  </div>
  <div class="card-body">
    <form id="update-stock" enctype="multipart/form-data">
      <input type="hidden" name="id" id="id" value="{{$stock->id}}">
      

      <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name"
          value="{{$stock->name}}" disabled>
      </div>

      <div class="form-group">
        <label for="stock_current">Stock Current</label>
        <input class="form-control" id="stock_current" name="stock_current" rows="10" value="{{$stock->stock_current}}"
          disabled>
      </div>

      <div class="form-group">
        <label for="stock_in">Stock In</label>
        <input type ="number" class="form-control" id="stock_in" name="stock_in" rows="10"value="{{$stock->stock_in}}" >
      </div>

      <div class="form-group">
        <label for="stock_out">Stock Out</label>
        <input type="number" class="form-control" id="stock_out" name="stock_out" rows="10" value="{{$stock->stock_out}}">
      </div>

   
     
      <div class="form-group">
        <input type="submit" class="btn btn-success" id="save-data" value="save">
      </div>

    </form>
  </div>
</div>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#update-stock').submit(function(e) {
    e.preventDefault();
    $("#save-data").addClass("btn disabled btn-success btn-progress");
    const id = $("#id").val();
    $.ajax({
      type: 'POST',
      url:`/stocks/update/stock/${id}`,
      data:new FormData(this),
      dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      error: function(err){
        $("#save-data").removeClass("disabled btn-progress");
        swal("Oops!", "Error Input Data!", "error");
      },
      success: function(response){
        console.log(response.status)
        if(response.status == 200 || response.status == 201){
          $("#save-data").removeClass("disabled btn-progress");
          swal("Success", "Data Anda Telah Disimpan!", "success");
          
        } else {
          $("#save-data").removeClass("disabled btn-progress");
          swal("Oops!", "Error Input Data!", "error");
        }
      },
    })
  })




</script>
@endsection