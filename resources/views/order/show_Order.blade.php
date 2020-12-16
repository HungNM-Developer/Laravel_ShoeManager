@extends('admin_layout')
@section('admin_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Customer Info</a></li>
            <li class="breadcrumb-item">Articles category</li>
            <li class="breadcrumb-item active" aria-current="page">Articles category</li>
        </ol>
    </div>
    {{-- col-xl-8 col-lg-7 mb-4 --}}

    {{-- <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Customer info</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>ID Customer</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">{{$users->id}}</a></td>
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                                <td>
                                    <a onclick="checkAvaProfile({{$users->id}})" class="btn btn-light btn-icon btn"
                                        role="button">
                                        <span class="icon">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        View Profile
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Order info</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>ID_Order</th>
                                <th>Created_At</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">{{ $order->id }}</a></td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Product Order List</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>ID_Product</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                {{-- <th>Price</th> --}}
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>
                                        {{ $tag->id }}

                                    </td>
                                    <td>
                                        {{ $tag->tag }}
                                    </td>
                                    <td>
                                        {{ $tag->quantity }}
                                    </td>
                                    <td>
                                        {{ $tag->quantity * $tag->price }} VNĐ
                                    </td>
                                </tr>
                            @endforeach
                            {{-- @foreach ($order->tags as $tag)
                                <tr>

                                    <td>
                                        <a href="#">
                                            {{ $tag->id }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $tag->tag }}
                                    </td>
                                    
                                    <td>    
                                        @foreach ($order->tag_order as $tag_order) 
                                            {{ $tag_order->quantity }}   
                                        @endforeach                           
                                    </td>
                                   
                                    <td>
                                        {{ number_format($tag->price) . '' . '$' }}
                                    </td>
                                    <td></td>
                                    
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <script>
        async function checkAvaProfile(id) {
            let url = 'http://localhost/ShoeManager/profile/check/' + id.toString();
            let request = await fetch(url);
            let respone = await request.json();
            if (!respone.payload) {
                if (confirm('The user does not currently have a profile, do you want to create profile?')) {
                    window.open('http://localhost/ShoeManager/profiles/' + id.toString(), "_self");
                }
            } else {
                window.open('http://localhost/ShoeManager/profiles/' + id.toString(), "_self");
            }
        }

    </script>
@endsection
