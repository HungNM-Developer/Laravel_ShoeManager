@extends('admin_layout')
@section('js')
    <script>
        $('#avatar').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

    </script>
@endsection
@section('admin_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật đơn hàng</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Product category</li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
        </ol>
    </div>
    <div class="row">
        <!-- lấy thông tin thông báo đã thêm vào session để hiển thị -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                <li>{{ $message }} </li>
                @if ($message = Session::get('file'))
                    <li>{{ $message }} </li>
                @endif

            </div>
        @endif

        <!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                <li>{{ $message }} </li>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cập nhật đơn hàng</h6>
                </div>

                {{-- @foreach ($edit_category_user as $key => $edit_value_user) --}}
                    <div class="card-body">
                        <form class="user" action="{{ route('tags.update', ['tag' => $tag->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- khai báo này dùng để thiết lập phương thức PUT 
                                                        nếu không khai báo thì khi submit không thiết lập HttpPUT -->
                            <div class="row">
                                <div class="col-lg-4 mb-4"></div>
                                <div class="col-lg-8 mb-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Id</label>
                                <input type="text" name="product_id" class="form-control form-control-user"
                                    id="profile_full_name" placeholder="" value="{{ $tag->id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="product_name" class="form-control form-control-user"
                                    id="profile_full_name" placeholder="" value="{{ $tag->tag }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Price</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" name="product_price" class="form-control" aria-label="Amount (to the nearest dollar)"
                                    placeholder="Enter price" value="{{ $tag->price }}"/>
                                    <div class="input-group-append">
                                      <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Description </label>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" placeholder="Enter description"
                                    name="product_description"
                                    aria-label="With textarea">{{ $tag->description }}</textarea>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Content</label>
                                <div class="input-group mb-3">               
                                    <textarea class="form-control" placeholder="Enter Content"
                                    name="product_content"
                                    rows="4" aria-label="With textarea">{{ $tag->content }}</textarea>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Image</label><br>
                                
                                <div class="card col-sm-4">
                                    <img class="card-img-top" src="{{ URL::to($tag->image) }}" alt="Card image cap">
                                </div><br>
                                <div class="col-sm-8 mb-4 mb-sm-0">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input " id="avatar" 
                                        name="product_image">
                                        <label for="avatar" class="custom-file-label">{{ $tag->image }}</label>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary"> Update Product
                            </button>

                        </form><br>



                    </div>
                    {{--
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
