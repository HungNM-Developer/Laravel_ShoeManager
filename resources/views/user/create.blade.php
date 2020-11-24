@extends('admin_layout')
@section('admin_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm user</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Product category</li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
        </ol>
    </div>
    {{-- col-xl-8 col-lg-7 mb-4 --}}

    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-light">Thêm user</h6>
                </div>
                <div class="card-body">
                
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        @method('POST')<!-- khai báo này dùng để thiết lập phương thức PUT 
                                            nếu không khai báo thì khi submit không thiết lập HttpPUT --> 
                        <div class="row">
                           
                            <div class="col-lg-12 mb-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="user_email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your
                                        email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="user_password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Nhập mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" name="user_name" class="form-control" id="exampleInputPassword1"
                                        placeholder="Nhập tên user">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-light btn-icon">
                                    <span class="icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>Add user
                                </button>
                                
                            </div>
                        </div>
                    </form>
                 
                </div>
            </div>
        </div>
    @endsection
