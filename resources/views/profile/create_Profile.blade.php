@extends('admin_layout')
@section('js')
<script>
    $('#avatar').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
@endsection
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
                
                    <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')<!-- khai báo này dùng để thiết lập phương thức PUT 
                                            nếu không khai báo thì khi submit không thiết lập HttpPUT --> 
                        <div class="row">
                           
                            <div class="col-lg-8 mb-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">User Id</label>
                                    <input type="text" name="profile_user_id" class="form-control" 
                                        id="exampleInputPassword1" placeholder="nhaapj">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Full name</label>
                                    <input type="text" name="profile_full_name" class="form-control" 
                                        id="exampleInputPassword1" placeholder="Nhập full name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa chỉ</label>
                                    <input type="text" name="profile_address" class="form-control" 
                                        id="exampleInputPassword1" placeholder="Nhập address">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Birthday</label>
                                    <input type="date" name="profile_birthday" class="form-control" 
                                        id="exampleInputPassword1" placeholder="Nhập birthday">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <input type="text" name="profile_phone" class="form-control" 
                                        id="exampleInputPassword1" placeholder="Nhập phone">
                                </div>
                                
                            </div>
                            
                            <div class="col-lg-4 mb-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Avatar</label>
                                    <div class="custom-file">
                                        {{-- <input type="file" name="profile_avatar" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label> --}}
                                        <input type="file" class="custom-file-input " id="avatar" name="avatar" >
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        {{-- <label for="avatar" class="custom-file-label">{{$profile->avatar}}</label> --}}
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-light btn-icon">
                                    <span class="icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>Add profile
                                </button>
                                
                            </div>
                        </div>
                    </form>
                 
                </div>
            </div>
        </div>
@endsection
