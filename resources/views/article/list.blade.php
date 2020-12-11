@extends('admin_layout')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Liệt kê danh mục sản phẩm</h1>
    <div class="col-lg-4 mb-4">
</div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Liệt kê danh mục</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Title</th>                            
                                <th>Body</th>
                                <th>Created_At</th>
                                <th>Tags</th>
                                <th>Status</th>
                                <th>Edit_Article</th>
                                <th>View_Details</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Created_At</th>
                                <th>Tags</th>
                                <th>Status</th>
                                <th>Edit_Article</th>
                                <th>View_Details</th>
                            </tr>
                        </tfoot>
                        <tbody>
            
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>
                                        <a href="articles/{{ $article->user_id }}">
                                            {{ $article->user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $article->title }}</td>
                                    
                                    <td>{{ $article->body }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>
                                        @foreach ($article->tags as $tag)
                                            <a href="#">{{ $tag->tag }} </a> ,
                                        @endforeach
                                    </td>
                                    <td>{{ $article->status }}</td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-icon btn-sm"
                                            role="button">
                                            <span class="icon">
                                                <i class="fas fa-user-edit"></i>
                                            </span>
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-light btn-icon btn-sm">
                                            <span class="icon">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </span>
                                            View
                                        </button>
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
