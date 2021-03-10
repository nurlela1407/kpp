@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Purchase</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Transaction</li>
                        <li class="breadcrumb-item active">Purchase</li>
                    </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> Admin KP.
                            <small class="float-right">Date: {{ $date('d F Y', strtotime($data[0]->date)) }}</small>
                        </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin KP.</strong><br>
                    admin mangrupa<br>
                    Bandung, Rancaekek<br>
                    Phone: 085872776864<br>
                    Email: info@mangrupa.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $data[0]->vendor->name}}</strong><br>
                    {{$data[0]->vendor->address }}<br>
                    Phone: {{$data[0]->vendor->phone}}
                  </address>
                </div>
                <!-- /.col -->


                <div class="col-sm-4 invoice-col">
                  <b>Invoice {{$data[0]->no_invoice}}</b><br>
                  <br>
                  <?php
                  if($data[0]->status =="order"){
                      $text = 'Order';
                      $label = "info";

                  }
                  if($data[0]->status =="received"){
                    $text = 'Received';
                    $label = "warning";
                    
                    }

                ?>
                  <b>Status</b>{!! "<span class='badge badge-".$label."'>".$text."</span>"!!}<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($detail as $detail):
                    ?>
                    <tr>
                      <td>{{ $detail->product->name }}</td>
                      <td>{{ number_format($detail->total, 0, '.', ',') }}</td>
                      <td>{{ number_format($detail->price, 0, '.', ',') }}</td>
                      <td>{{ number_format($detail->price * $detail_total, 0, '.', ',') }}</td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- /.col -->
                <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Total:</th>
                        <td>{{ number_format($data[0]->total, 0, '.', ',') }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

        
<!.. /.content ..>
@endsection
@push('js')
@endpush