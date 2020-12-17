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
                    <h6 class="m-0 font-weight-bold text-primary">Update Order</h6>
                </div>

                {{-- @foreach ($edit_category_user as $key => $edit_value_user) --}}
                    <div class="card-body">
                        <form class="order" action="{{ route('orders.update', ['order' => $order->id]) }}" 
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- khai báo này dùng để thiết lập phương thức PUT 
                                                                    nếu không khai báo thì khi submit không thiết lập HttpPUT -->

                            <div class="form-group">
                                <label for="exampleInputPassword1">ID Order</label>
                                <input type="datetime" name="category_user_name" class="form-control"
                                    id="exampleInputPassword1" placeholder="{{ $order->id }}" disabled>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Created_At</label>
                                        <input type="datetime" name="category_user_name" class="form-control"
                                            id="exampleInputPassword1" placeholder="{{ $order->created_at }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Updated_At</label>
                                        <input type="datetime" name="category_user_name" class="form-control"
                                            id="exampleInputPassword1" placeholder="{{ $order->updated_at }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <!-- Simple Tables -->
                                    <div class="card">
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Customer info</h6>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>ID Customer</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href="#">{{ $user->id }}</a></td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="select2SinglePlaceholder">Status with Placeholder</label>
                                <select class="select2-single-placeholder form-control" name="order_status"
                                    id="select2SinglePlaceholder">

                                    <option value="{{ $order->status }}" selected>
                                        {{ $order->status }}
                                    </option>
                                    <option value="Canceled">Canceled</option>
                                    <option value="Unresolved">Unresolved</option>
                                    <option value="Expires">Expires</option>
                                    <option value="Refund">Refund</option>
                                    <option value="Completion">Completion</option>
                                    <option value="Processed">Processed</option>
                                    {{-- @foreach (['pending', 'shipping', 'received'] as $order_status)
                                        @if ($order_status == $order->status)
                                            <option value="{{ $order_status }}" selected>{{ $order_status }}</option>
                                            @else
                                            <option value="{{ $order_status }}">{{ $order_status }}</option>
                                        @endif
                                    @endforeach --}}
                                </select>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <!-- Simple Tables -->
                                    <div class="card">
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Product Order List</h6>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush">
                                                <thead class="thead-light">
                                                    <tr>
                                                        {{-- <th>ID_Product</th>
                                                        --}}
                                                        <th>Name</th>
                                                        <th>Image</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Total Price</th>
                                                        {{-- <th></th> --}}

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tags as $tag)
                                                        <tr>

                                                            <td>
                                                                {{ $tag->tag }}
                                                            </td>
                                                            <td>
                                                                <img class="img-profile rounded-circle"
                                                                    style="width:50px;height:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"
                                                                    src="{{ URL::to($tag->image) }}" />
                                                            </td>
                                                            <td>
                                                                {{ $tag->quantity }}
                                                            </td>

                                                            <td>
                                                                {{ number_format($tag->price) . '' . '$' }}
                                                            </td>
                                                            <td>
                                                                {{ number_format($tag->quantity * $tag->price) . '' . '$' }}
                                                            </td>
                                                            
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"> Update Order
                            </button>
                        </form><br>
                    </div>
                    {{--
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
