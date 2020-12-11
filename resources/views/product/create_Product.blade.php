@extends('admin_layout')
@section('admin_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Product category</li>
            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
        </ol>
    </div>
    {{-- col-xl-8 col-lg-7 mb-4 --}}

    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-light">Add Product</h6>
                </div>
                <div class="card-body">
                
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')<!-- khai báo này dùng để thiết lập phương thức PUT 
                                            nếu không khai báo thì khi submit không thiết lập HttpPUT --> 
                        <div class="row">
                           
                            <div class="col-lg-8 mb-4">
                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">User Id</label>
                                    <input type="text" name="profile_user_id" class="form-control" disabled
                                        id="exampleInputPassword1" placeholder="Nhập user id">
                                </div> --}}
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product name</label>
                                    <input type="text" name="product_name" class="form-control" 
                                        id="exampleInputPassword1" placeholder="Enter product name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product type</label>
                                    <input type="text" name="product_type" class="form-control" 
                                        id="exampleInputPassword1" placeholder="Enter product type">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product size</label>
                                    <input type="number" name="product_size" class="form-control" 
                                        id="exampleInputPassword1" placeholder="Enter product size">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product price</label>
                                    <input type="number" name="product_price" class="form-control" 
                                        id="exampleInputPassword1" placeholder="Enter product price">
                                </div>
                                
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product image</label>
                                    <div class="custom-file">
                                        <input type="file" name="product_avatar" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-light btn-icon">
                                    <span class="icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>Add Product
                                </button>
                                
                            </div>
                        </div>
                    </form>
                 
                </div>
            </div>
        </div>
    @endsection
