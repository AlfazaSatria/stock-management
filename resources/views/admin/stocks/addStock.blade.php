@extends('layouts.app')
@section('title', 'Stocks')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add Stock</h4>
    </div>
    <div class="card-body">
        <form id="stock-add">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="desc">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="desc">Current Stock</label>
                        <input type="number" class="form-control" id="stock_current" name="stock_current"
                            placeholder="Current Stock">
                    </div>
                </div>
               
            </div>
            <div class="form-group">
                <button class="btn btn-success" id="save-data">Save</button>
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
  $('#stock-add').submit(function(e) {
    e.preventDefault();
    $("#save-data").addClass("btn disabled btn-success btn-progress");
    
    $.ajax({
      type: 'POST',
      url:"/stocks/add",
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
          swal("Success", "Data Anda Telah Disimpan!", "success");
          $("#save-data").removeClass("disabled btn-progress");
          $('#stock-add')[0].reset();
          $(".select2").val("");
          $(".select2").trigger("change");
        } else {
          $("#save-data").removeClass("disabled btn-progress");
          swal("Oops!", "Error Input Data!", "error");
        }
      },
    })
  })
</script>
@endsection