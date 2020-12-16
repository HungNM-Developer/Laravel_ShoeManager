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
                        <form class="user" action="{{ route('articles.update', ['article' => $article->id]) }}"
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
                                <label for="exampleInputEmail1">Article id</label>
                                <input type="text" name="profile_user_id" class="form-control form-control-user"
                                    id="profile_full_name" placeholder="" value="{{ $article->id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer</label>
                                <input type="text" name="profile_full_name" class="form-control form-control-user"
                                    id="profile_full_name" placeholder="" value="{{ $article->user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="article_title" class="form-control form-control-user"
                                    id="profile_address" placeholder="Address" value="{{ $article->title }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="select2SinglePlaceholder">Status with Placeholder</label>
                                <select class="select2-single-placeholder form-control" name="article_status" id="select2SinglePlaceholder">
                                  
                                  <option value="{{ $article->status }}" selected>
                                    {{ $article->status }}
                                    </option>
                                  <option value="Canceled">Canceled</option>
                                  <option value="Unresolved">Unresolved</option>
                                  <option value="Expires">Expires</option>
                                  <option value="Refund">Refund</option>
                                  <option value="Completion">Completion</option>
                                  <option value="Processed">Processed</option>                         
                                </select>
                              </div>
                              
                            <div class="form-group" id="simple-date4">
                                <label for="dateRangePicker">Date_At</label>
                                <div class="input-daterange input-group">
                                  <input type="text" class="input-sm form-control" name="article_created_at" 
                                  placeholder="{{ $article->created_at }}"/>
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">to</span>
                                  </div>
                                  <input type="text" class="input-sm form-control" name="article_updated_at" 
                                  placeholder="{{ $article->updated_at }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Body</label>
                                <textarea type="text" name="article_body" class="form-control form-control-user"
                                    id="profile_phone" rows="4">{{ $article->body }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="select2Multiple">Tags</label>
                                <select class="select2-multiple form-control" name="tag->tag" multiple="multiple"
                                  id="select2Multiple" disabled>
                                  @foreach ($article->tags as $tag)
                                  <option value="Tags" selected>{{ $tag->tag }}</option>
                                  @endforeach
                                  
                                 
                                </select>
                              </div>
                            
                            <button type="submit" class="btn btn-primary"> Cập nhật hóa đơn
                            </button>
                            
                        </form><br>
                        
                        
                        
                    </div>
                    {{--
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
