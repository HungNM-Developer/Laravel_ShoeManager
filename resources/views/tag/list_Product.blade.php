@extends('admin_layout')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Products</h1>
    <div class="col-lg-4 mb-4">
</div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Products</h6>
                </div>
                <div class="p-3">
                    <div class="row mx-md-n5">
                        <div class="col px-md-5">
                            <div class="p-3 border bg-light">
                                <a href="tags/create" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                    <span class="text">Add Product</span>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>                              
                                <th>Price</th>                               
                                <th></th>   
                                <th></th> 
                                <th></th>                                                                                      
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>                              
                                <th>Price</th>    
                                <th></th>   
                                <th></th> 
                                <th></th>                                                                                                                     
                            </tr>
                        </tfoot>
                        <tbody>
            
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>
                                        <img class="img-profile rounded-circle" 
                                        style="width:50px;height:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"
                                        src="{{URL::to($tag->image)}}"/>
                                    </td>
                                    <td>{{ $tag->tag }}</td>
                                    <td>{{ '$'.' '.number_format($tag->price) }}</td>
                                    <td>
                                        <a href="tags/{{ $tag->id }}" class="btn btn-light btn-icon btn-sm"
                                            role="button">
                                            <span class="icon">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            View
                                        </a>
                                        
                                    </td>
                                    <td>
                                        <a href="tags/{{ $tag->id }}/edit" class="btn btn-success btn-icon btn-sm"
                                            role="button">
                                            <span class="icon">
                                                <i class="fas fa-user-edit"></i>
                                            </span>
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form class="tag" action="tags/{{ $tag->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this user?');"
                                                value="Delete">
                                                <span class="icon">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Delete Modal Logout -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
@endsection
