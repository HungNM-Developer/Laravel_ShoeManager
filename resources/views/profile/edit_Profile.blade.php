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
                        <form class="user" action="{{ route('profiles.update', ['profile' => $profile->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- khai báo này dùng để thiết lập phương thức PUT 
                                                nếu không khai báo thì khi submit không thiết lập HttpPUT -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">User id</label>
                                <input type="text" name="profile_user_id" class="form-control form-control-user"
                                    id="profile_full_name" placeholder="Full Name" value="{{ $profile->user_id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full name</label>
                                <input type="text" name="profile_full_name" class="form-control form-control-user"
                                    id="profile_full_name" placeholder="Full Name" value="{{ $profile->full_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="profile_address" class="form-control form-control-user"
                                    id="profile_address" placeholder="Address" value="{{ $profile->address }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="profile_phone" class="form-control form-control-user"
                                    id="profile_address" placeholder="Phone" value="{{ $profile->phone }}">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="exampleInputEmail1">Birthday</label>
                                    <input type="date" class="form-control form-control-user" name="profile_birthday"
                                        id="profile_birthday" placeholder="Birthday" value="{{ $profile->birthday }}">
                                </div>
                            </div>
                            <div class="form-group">
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
                            </div>
                            <button type="submit" class="btn btn-primary"> Cập nhật user
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
