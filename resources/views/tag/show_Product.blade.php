@extends('admin_layout')
@section('admin_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product - {{ $tag->id }}</h1>
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

                    <h6 class="m-0 font-weight-bold text-light">Product</h6>
                    <div class="m-1">
                        <a href="{{ $tag->id }}/edit" class="btn btn-light btn-icon btn"
                            role="button">
                            <span class="icon">
                                <i class="fas fa-edit"></i>
                            </span>
                            Edit Product
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="/ShoeManager/" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <div class="card">
                                        <img class="card-img-top" src="{{URL::to($tag->image)}}"/> 
                                        {{-- <div style="background-image: url({{$profile->avatar}}), width: 150px"></div> --}}
                                        {{-- <img class="card-img-top"
                                            src="{{ $profile->avatar }}"
                                            alt="Card image cap"> --}}
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
                                            
                                            
                                            {{-- <h5 class="card-title">
                                                {{ $profile->full_name }}</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make
                                                up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                            --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 mb-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Id</label>
                                    <input type="text" name="category_user_id" class="form-control"
                                        id="exampleInputPassword1" placeholder="{{ $tag->id }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name Product</label>
                                    <input type="text" name="category_user_name" class="form-control"
                                        id="exampleInputPassword1" placeholder="{{ $tag->tag }}" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Price Product</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                                        placeholder="{{ $tag->price }}" disabled>
                                        <div class="input-group-append">
                                          <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Description </label>
                                    <div class="input-group mb-3">
                                        
                                        <textarea class="form-control" placeholder="{{ $tag->description }}" disabled
                                        aria-label="With textarea"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Content</label>
                                    <div class="input-group mb-3">
                                        
                                        <textarea class="form-control" placeholder="{{ $tag->content }}" disabled
                                        rows="4" aria-label="With textarea"></textarea>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
