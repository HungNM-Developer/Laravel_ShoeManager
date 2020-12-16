@extends('admin_layout')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Order</h1>
    <div class="col-lg-4 mb-4">
</div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Order</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Created_At</th>
                                {{-- <th>Title</th>                            
                                <th>Body</th>
                                <th>Updated_At</th>
                                <th>Tags</th> --}}
                                <th>Status</th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Created_At</th>
                                {{-- <th>Title</th>                            
                                <th>Body</th>
                                <th>Updated_At</th>
                                <th>Tags</th> --}}
                                <th>Status</th>
                                <th></th>
                                
                            </tr>
                        </tfoot>
                        <tbody>
            
                            @foreach ($listOfOrder as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->status }}</td>
                                    {{-- <td>{{ $article->title }}</td>
                                    
                                    <td>{{ $article->body }}</td>
                                    
                                    <td>{{ $article->updated_at }}</td>
                                    <td>
                                        @foreach ($article->tags as $tag)
                                            <a href="#">{{ $tag->tag }} </a><br>
                                        @endforeach
                                    </td> --}}
                                    
                                    <td>
                                        <a href="orders/{{ $order->id }}" class="btn btn-light btn-icon btn-sm"
                                            role="button">
                                            <span class="icon">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            View
                                        </a>
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
