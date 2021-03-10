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
                    <h1 class="m-0">Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Create Product</li>
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
                    <h3 class="card-title">Edit Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('product.update', $data[0]->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="nama" class="col-sm-6 col-form-label">Nama</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="harga" class="col-sm-6 col-form-label">Price</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="eletronika_id" class="col-sm-6 col-form-label">Id Elektronika</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="elektronika_id" name="elektronika_id" placeholder="Elektronika Id">
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="jenis" class="col-sm-6 col-form-label">Jenis</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="berat" class="col-sm-6 col-form-label">Berat</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="berat" name="berat" placeholder="Berat">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="gambar" class="col-sm-6 col-form-label">Gambar</label>
                            <div class="col-sm-8">
                                <input type="file" name="gambar" class="form-control" required>
                                <!-- <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar"> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="stock_available" class="col-sm-6 col-form-label">Stock</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="stock_available" name="stock_available" placeholder="Stock">
                            </div>
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
        <!-- /.content -->
        @endforeach
