@extends('admin_layout')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Articles - {{ $article->user_id }}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Articles</a></li>
        <li class="breadcrumb-item">Articles category</li>
        <li class="breadcrumb-item active" aria-current="page">Articles category</li>
    </ol>
</div>
{{-- col-xl-8 col-lg-7 mb-4 --}}

<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-light">Articles</h6>
                <div class="m-1">
                    {{-- <a href="{{ $article->id }}/edit" class="btn btn-light btn-icon btn" --}}
                    <a href="#" class="btn btn-light btn-icon btn"
                        role="button">
                        <span class="icon">
                            <i class="fas fa-user-edit"></i>
                        </span>
                        Edit
                    </a>
                </div>
            </div>
            <div class="card-body">

                <form action="/ShoeManager/" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Avatar</label>
                                <div class="card">
                                    {{-- <img class="card-img-top" src="{{URL::to($profile->avatar)}}"/>  --}}
                                    
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col">
                                                <a href="#" class="btn btn-lg mb-1" role="button">
                                                    <span class="icon">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </span>
                                                </a>
                                                <h5 class="text-center font-weight-bold">500</h5>
                                            </div>
                                            <div class="col">
                                                <a href="#" class="btn btn-lg mb-1" role="button">
                                                    <span class="icon">
                                                        <i class="fab fa-twitter"></i>
                                                    </span>
                                                </a>
                                                <h5 class="text-center font-weight-bold">900</h5>
                                            </div>
                                            <div class="col">
                                                <a href="#" class="btn btn-lg mb-1" role="button">
                                                    <span class="icon">
                                                        <i class="fab fa-google-plus-g"></i>
                                                    </span>
                                                </a>                                          
                                                <h5 class="text-center font-weight-bold">700</h5>
                                            </div>
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 mb-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Article Id</label>
                                <input type="text" name="category_user_id" class="form-control"
                                    id="exampleInputPassword1" placeholder="{{ $article->user_id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Customer</label>
                                <input type="text" name="category_user_name" class="form-control"
                                    id="exampleInputPassword1" placeholder="{{ $user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Title</label>
                                <input type="text" name="category_user_name" class="form-control"
                                    id="exampleInputPassword1" placeholder="{{ $article->title }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Created_At</label>
                                <input type="text" name="category_user_name" class="form-control"
                                    id="exampleInputPassword1" placeholder="{{ $article->created_at }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Body</label>
                                <textarea type="text" name="category_user_phone" class="form-control"
                                    id="exampleInputPassword1" rows="4" placeholder="{{ $article->body }}" disabled></textarea>
                                
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection