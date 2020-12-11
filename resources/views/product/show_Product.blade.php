@extends('admin_layout')
@section('admin_content')


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <div class="col-lg-4 mb-4">
    </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">products list</h6>
                </div>
                <div class="p-3">
                    <div class="row mx-md-n5">
                        {{-- <div class="col px-md-5">
                            <div class="p-3 border bg-light">
                                <a href="users/create" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                    <span class="text">Create user</span>
                                </a>
                            </div>
                        </div> --}}
                        <div class="col px-md-5">
                            <div class="p-3 bg-light">
                                <a href="products/create" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                    <span class="text">Add product</span>
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
                                <th>Name</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th>Price</th>
                                
                                <th></th>
                                <th></th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th>Price</th>
                                
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name_product }}</td>
                                    <td>{{ $product->type_product }}</td>
                                    <td>{{ $product->size_product }}</td>
                                    <td>{{ $product->price_product }}</td>
                                    
                                    <td>
                                        <a href="products/{{ $product->id }}/edit" class="btn btn-success btn-icon btn-sm"
                                            role="button">
                                            <span class="icon">
                                                <i class="fas fa-user-edit"></i>
                                            </span>
                                            Edit
                                        </a>
                                    </td>

                                    <td>
                                        <form class="user" action="poducts/{{ $product->id }}" method="POST">
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
                                    <td>
                                        <button id="{{$product->id}}" class="btn btn-light btn-icon btn-sm">
                                            <span class="icon">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </span>
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
    {{-- <script>
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
    <script>
        function ShowPass(haha){
            let a = haha.id;
            let b = document.getElementById('in'+ a);
            if(b.type == "password"){
                b.type = "text";
            }else{
                b.type = "password";
            }

        }

    </script> --}}
@endsection
