@extends('layouts.backend.app')

@section('content')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0">Vendor</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item active">View Vendor</li>
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
                    <h3 class="card-title">View Vendor</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('vendor.update', $data[O]->id)}}">
                    @csrf
                    <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name" class="col-sm-6 col-form-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $data[O]->name }}" placeholder="Name" disable>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="col-sm-6 col-form-label">Address</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="address" name="address" value="{{ $data[O]->address }}" placeholder="Address" disable>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="contactPerson" class="col-sm-6 col-form-label">Contact Person</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="contactPerson" name="contactPerson" value="{{ $data[O]->cp }}" placeholder="Contact Person" disable>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="phone" class="col-sm-4 col-form-label">Phone No</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $data[O]->phone }}" placeholder="Phone No" disable>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status" id="status" disable>
                                    <option value="l" {{ $data[O]->active ===l ? 'selected' : '' }}>Active</option>
                                    <option value="O" {{ $data[O]->active ===O ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="user-modified" class="col-sm-4 col-form-label">Modified By:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="user-modified" name="userModify" value="{{ $data[O]->user_modify->name }}" disable>
                            </div>
                        </div>
                        
                    </div>
                  
                    </div>
                    <!-- /.card-body -->
                  
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