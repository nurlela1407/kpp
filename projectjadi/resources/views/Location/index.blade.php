@extends('layouts.backend.app')

@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0">Store Location</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Store Location</li>
                    </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

            <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Store Location List</h3>
                <a href="{{route('location.create')}}" class="btn btn-info btn-sm float-right" title="Create">Create</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                  <tr>
                   
                    <th>No</th>
                    <th>Name Location</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                   
                  </tr>
                  </thead>
                  
                  <tfoot>
                  <tr>
                    
                  <?php
                    foreach ($location as $data) {
                        echo '<tr>';
                        echo '<td>'.$data->id.'</td>';
                        echo '<td>'.$data->name.'</td>';
                        echo '<td>'.$data->latitude.'</td>';
                        echo '<td>'.$data->longitude.'</td>';
                        echo '</tr>';
                    }
                  ?>
                   
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('js')
<!-- DataTables -->
<script src="{{ asset('asset/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      responsive:true,
      processing:true,
      pagingType: 'full_numbers',
      stateSave:false,
      scrollY:true,
      scrollX:true,
      ajax:"{{ url('product/datatable') }}",
      order:[O, 'desc'],
      columns:[
        {data:'code', name:'code'},
        {data:'name', name:'name'},
        {data:'purchase_price', name:'purchase_price'},
        {data:'information', name:'information'},
        {data:'active',
          render:function(data){
            if(data=='l')
            {
              return '<span class="badge badge-success">Active</span>';
            }
            if(data=='O')
            {
              return '<span class="badge badge-warning">Inactive</span>';
            }
          },
        },
        {data:'action', name:'action', searchable: false, sortable:false}
      ]
    });
  });
</script>
<script>
  function deleteData(dt){
    if (confirm("Are you sure you want to delete this data?")){
      $.ajax({
        type:"DELETE",
        url:$(dt).data("url"),
        data:{
          "_token":"{{ csrf_token() }}"
        },
        success:function (response) {
          if (response.status){
            location.reload();
          }
        }
        error:function(response){
            console.log(response);
        }
      });
    }
    return false;
  }
</script>
@endpush