@extends('layouts.backend.app')

@push('css')
<!-- Date -->
<link rel="stylesheet" href="{{asset ('asset/plugins/jquery-ui/jquery-ui.css') }}">
<link rel="stylesheet" href="{{asset ('asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{asset ('asset/plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0">Purchase Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Transaction</li>
                        <li class="breadcrumb-item active">Edit Purchase Order</li>
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
            <!-- left column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Purchase Order</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('purchase-order.update', $data[0]->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="date" class="col-sm-6 col-form-label">Date</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="date" name="date" value="{{date('d-m-Y', strtotime($data[0]->date))}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="invoice_no" class="col-sm-6 col-form-label">Invoice No</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="invoice_no" id="invoice_no" value="{{$data[0]->no_invoice}}" placeholder="Invoice No">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="info" class="col-sm-4 col-form-label">Information</label>
                            <div class="col-sm-12">
                                <textarea name="information" class="form-control" rows="4">{{$data[0]->information}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="id_ven" class="col-sm-4 col-form-label">Supplier Name</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="hidden" readonly="true" class="form-control" value="{{$data[0]->id_ven}}" name="id_ven" id="id_ven">
                                <input readonly="true" type="text" name="name_ven" id="id_ven" class="form-control" value="{{$data[0]->vendor->name}}" placeholder="Supplier Name">
                            </div>
                            <div class="col-sm-4">
                                <a href="/transaction/purchase-order/vendor/popup_media"class="btn btn-info" title="Vendor" data-toggle="modal" data-target="#modal-default">Supplier</a>
                            </div>
                    </div>

                    <div class="col-md-12 field-wrapper">
                    <div class="form-group row">
                        <div class="col-md-12">
                           <label for="id_raw_product" class="col-sm-4 col-form-label">Product Name</label>
                        </div>
                        
                        @if(isset($data))
                            <?php
                            $i = 1;
                            ?>
                            @foreach($detail as $key=>$value)
                        <div class="col-sm-3">
                            <input type="hidden" readonly="true" class="form-control" value="<?=$value['id_product'];?>" name="id_raw_product_[]" id="id_raw_product_<?=$i;?>" placeholder="Product Name">
                            <input type="text" readonly="true" class="form-control" value="<?=$value['product']->name?>" name="name_raw_product_[]" id="name_raw_product_<?=$i;?>" placeholder="Product Name">
                        </div>
                        <div class="col-sm-2">
                            <a href="/transaction/purchase-order/product/popup_media/1" class="btn btn-info" title="Product" data-toggle="modal" data-target="#modal-default">Product</a>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="price[]" value="<?=$value['price'];?>" id="price_<?=$i;?>" placeholder="Price">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="total[]" value="<?$value['total'];?>" id="total_<?=$i;?>" placeholder="Total">
                        </div>

                        <?php
                            if ($i==1){

                            
                            ?>
                        <div class="col-sm-2">
                            <a href="javascript:void(0)" class="btn btn-primary add_Button" title="Add Row"><i class="fas fa-plus"></i> </a>
                        </div>

                        <?php
                        }else{
                        ?>
                    
                        <div class="col-sm-2">
                        <a href="javascript:void(0)" class="btn btn-danger remove" title="Delete"><i class="fas fa-minus"></i> </a>
                        </div>
                        <?php
                        }
                        $i++;
                        ?>
                        @endforeach
                        @endif

                    </div>
                    </div>

                </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-default float-right">Submit</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        
    {{--  Modal --}}

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@endsection

@push('js')

<!-- DataTables -->
<script src="{{ asset('asset/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<script>
    $(document).ready(function (){
        var addButton = $('.add_Button');
        var wrapper = $('.field-wrapper');
        var X = "{{ $detail_count +1 }}";

        $(addButton).click(function (){
            X++;
            $(wrapper).append('<div class="form-group row">'+
                         '<div class="col-sm-3">'+
                            '<input type="hidden" readonly="true" class="form-control" name="id_raw_product[]" id="id_raw_product_'+X+'" placeholder="Product Name">'+
                            '<input type="text" readonly="true" class="form-control" name="name_raw_product[]" id="name_raw_product_'+X+'" placeholder="Product Name">'+
                        '</div>'+
                        '<div class="col-sm-2">'+
                            '<a href="/transaction/purchase-order/product/popup_media/'+X+'" class="btn btn-info" title="Product" data-toggle="modal" data-target="#modal-default">Product</a>'+
                        '</div>'+
                        '<div class="col-sm-3">'+
                            '<input type="text" class="form-control" name="price[]" id="price_'+X+'" placeholder="Price">'+
                        '</div>'+
                        '<div class="col-sm-2">'+
                            '<input type="text" class="form-control" name="total[]" id="total_'+X+'" placeholder="Total">'+
                        '</div>'+
                        '<div class="col-sm-2">'+
                            '<a href="javascript:void(0)" class="btn btn-danger remove" title="Delete"><i class="fas fa-minus"></i> </a>'+
                        '</div>'+
                        '</div>'
            );

        });

        $(wrapper).on('click','.remove', function(e){
           if (confirm("Do you want to delete this row")){
            e.preventDefault();
            $(this).parent().parent().remove();
           }
        });
    });

</script>


<script>
        $(function(){
           $('#date').datepicker({
            autoclose:true,
            dateFormat:'dd-mm-yy',
             });
        })
</script>

<script>
    $('#modal-default').bind("show.bs.modal", function(e){
        var link = $(e.relatedTarget);
        $(this).find(".modal-body").load(link.attr("href"));
    });
</script>

@endpush