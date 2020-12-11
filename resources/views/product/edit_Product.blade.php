@extends('admin_layout')
@section('admin_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật danh mục</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Product category</li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cập nhật user</h6>
                </div>

                {{-- @foreach ($edit_category_user as $key => $edit_value_user) --}}
                    <div class="card-body">
                        <form class="user" action="{{ route('products.update', ['product' => $product->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- khai báo này dùng để thiết lập phương thức PUT 
                                                nếu không khai báo thì khi submit không thiết lập HttpPUT -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product id</label>
                                <input type="text" name="product_id" class="form-control form-control-user"
                                    id="product_id" placeholder="id" value="{{ $product->id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="product_name" class="form-control form-control-user"
                                    id="product_name" placeholder="Name Product" value="{{ $product->name_product }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Type</label>
                                <input type="text" name="product_type" class="form-control form-control-user"
                                    id="product_type" placeholder="Address" value="{{ $product->type_product }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Size</label>
                                <input type="number" name="product_size" class="form-control form-control-user"
                                    id="product_size" placeholder="Product Size" value="{{ $product->size_product }}">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="number" class="form-control form-control-user" name="product_price"
                                        id="product_price" placeholder="Product Price" value="{{ $product->price_product }}">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputPassword1">Avatar</label>
                                <div class="custom-file">
                                    <input type="file" value="{{ $profile->avatar }}" name="profile_avatar"
                                        class="custom-file-input" id="customFile">
                                        <br><br>
                                        <div class="card col-sm-4">
                                            <img class="card-img-top"
                                                src="{{ URL::to('public/uploads/users/' . $profile->avatar) }}"
                                                alt="Card image cap">
                                        </div>
                                    
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary"> Update Product
                            </button>
                            {{-- <input type="submit" class="btn btn-primary" value="Update">
                            --}}
                        </form>


                    </div>
                    {{--
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
