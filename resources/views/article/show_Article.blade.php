@extends('admin_layout')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Articles - {{ $article->id }}</h1>
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
                    <a href="{{ $article->id }}/edit" class="btn btn-light btn-icon btn"
                        role="button">
                        <span class="icon">
                            <i class="fas fa-edit"></i>
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
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                          <thead class="thead-light">
                                            <tr>
                                              <th>Tags</th>
                                              <th>Status</th>
                                              {{-- <th>Action</th> --}}
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                             
                                            <td><span>
                                                @foreach ($article->tags as $tag)
                                                    {{ $tag->tag }}<br>
                                                @endforeach</span>
                                            </td>
                                            <td><a href="#" class="btn btn-sm btn-primary">{{ $article->status }}</a></td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                      </div>
                                      <div class="card-footer"></div>
                                    
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
                                    id="exampleInputPassword1" placeholder="{{ $article->id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Customer</label>
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="category_user_name" class="form-control"                  
                                    id="exampleInputPassword1" placeholder="{{ $article->user->name }}" disabled>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-0">
                                        <a onclick="checkAvaProfile({{ $article->user->id }})" 
                                            class="btn btn-light btn-icon btn" role="button">
                                            <span class="icon">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            View Profile
                                        </a>
                                    </div>
                                    
                                    
                                </div>
                                
                                    
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Title</label>
                                <input type="text" name="category_user_name" class="form-control"
                                    id="exampleInputPassword1" placeholder="{{ $article->title }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Created_At</label>
                                <input type="date" name="category_user_name" class="form-control"
                                    id="exampleInputPassword1" placeholder="{{ $article->created_at }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Updated_At</label>
                                <input type="date" name="category_user_name" class="form-control"
                                    id="exampleInputPassword1" placeholder="{{ $article->updated_at }}" disabled>
                            </div>
                            <div class="form-group" id="simple-date4">
                                <label for="dateRangePicker">Range Select</label>
                                <div class="input-daterange input-group">
                                  <input type="text" class="input-sm form-control" name="start" 
                                  placeholder="{{ $article->created_at }}" disabled/>
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">to</span>
                                  </div>
                                  <input type="text" class="input-sm form-control" name="end" 
                                  placeholder="{{ $article->updated_at }}" disabled/>
                                </div>
                              </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Body</label>
                                <textarea type="text" name="category_user_phone" class="form-control"
                                    id="exampleInputPassword1" rows="4" placeholder="{{ $article->body }}" disabled></textarea>
                                
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputPassword1">Tags</label>
                                <textarea type="text" name="category_user_phone" class="form-control"
                                    id="exampleInputPassword1" rows="4" 
                                    placeholder="
                                    @foreach ($article->tags as $tag)
                                        {{ $tag->tag }}
                                    @endforeach" disabled></textarea>
                                
                            </div> --}}
                            
                        </div>
                        
                    </div>
                </form>
                <script>
                    async function checkAvaProfile(id) {
                        let url = 'http://localhost/ShoeManager/profile/check/' + id.toString();
                        let request = await fetch(url);
                        let respone = await request.json();
                        if (!respone.payload) {
                            if (confirm('The user does not currently have a profile, do you want to create profile?')) {
                                window.open('http://localhost/ShoeManager/profiles/' + id.toString(),"_self");
                            }
                        }else{
                            window.open('http://localhost/ShoeManager/profiles/' + id.toString(),"_self");
                        }
                    }
            
                </script>
            </div>
        </div>
    </div>
</div>
@endsection