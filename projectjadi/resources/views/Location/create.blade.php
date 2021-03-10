@extends('layouts.backend.app')

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
                        <li class="breadcrumb-item active">Create Store Location</li>
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
                    <h3 class="card-title">Create Store Location</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('location.store')}}">
                    @csrf
                    <div class="card-body">
            

                   
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="id" class="col-sm-6 col-form-label">Nomer</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="id" name="code" placeholder="Id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="name" class="col-sm-6 col-form-label">Name Location</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                            </div>
                                                        
                        </div>

                        <div class="form-group row">
                        <div class="col-md-4">
                            <label for="latitude" class="col-sm-4 col-form-label">Latitude</label>
                            <div class="col-sm-8">
                                <input type="float" class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="longitude" class="col-sm-4 col-form-label">Longitude</label>
                            <div class="col-sm-8">
                            <input type="float" class="form-control" id="longitude" name="longitude" placeholder="Longitude">
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

@endsection