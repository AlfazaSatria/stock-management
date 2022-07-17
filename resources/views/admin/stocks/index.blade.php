@extends('layouts.app')
@section('title', 'Stocks')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Stock Management</h4>
        <div class="card-header-action">
            <a href="{{ route('stocks.show.add.stock') }}" class="btn btn-icon icon-left btn-info"><i class="fas fa-plus"
                    type="button"></i>Add Stock
            </a>
           
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-stocks" class="table table-striped table-bordered" style="width:100%">
            </table>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke">
        Stock Management
    </div>
</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
    $(function() {
        var oTable = $('#table-stocks').DataTable({
          "columnDefs": [{
                "defaultContent": "-",
                "targets": "_all"
            }],
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{url()->current()}}'
            },
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', title: 'No'},
            {data: 'name', name: 'name', title: 'Product Name'},
            {data: 'stock_current', name: 'stock_current', title: 'Current Stock'},
            {data: 'stock_in', name: 'stock_in', title: 'Stock In'},
            {data: 'stock_out', name: 'stock_out', title: 'Stock Out'},
            {data: 'action', name: 'action', title: 'Aksi'},
        ],
        });
    });

    $(document).on('click', '#delete', function(){
      swal({
              title: 'Delete',
              text: 'Are you sure delete this data?',
              icon: 'warning',
              buttons: true,
            })
            .then((willProccess) => {
              if(willProccess){
                let id = $(this).data("id");
                $.ajax(
                {
                    url: `/stocks/delete/${id}`,
                    type: 'delete',
                    data: {
                        id
                    },
                    success: function (response)
                    {
                        swal("Success", "Your Data is alreadt deleted!", "success");
                        oTable.ajax.reload(null,false);
                    },
                    error: function(xhr) {
                        $("#save-data").removeClass("disabled btn-progress");
                    swal("Oops!", "Error Delete Data!", "error");
                    }
                });
              };
      });        
    });
</script>


@endsection