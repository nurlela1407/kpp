@extends('layouts.backend.app')

@section('content')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0">About Us</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">Create About Us</li>
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
                    <h3 class="card-title">Create About Us</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('aboutus.store')}}">
                    @csrf
                    <div class="card-body">
                    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="info" class="col-sm-4 col-form-label">Information</label>
                            <div class="col-sm-12">
                                <textarea name="information" class="form-control" rows="4"></textarea>
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