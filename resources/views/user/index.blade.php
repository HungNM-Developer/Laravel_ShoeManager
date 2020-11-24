@extends('admin_layout')
@section('admin_content')


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Liệt kê danh mục sản phẩm</h1>
        {{-- <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Product category</li>
            <li class="breadcrumb-item active" aria-current="page">All Category</li>
        </ol> --}}
        <div class="col-lg-4 mb-4">
            {{--
            <x-update-alert type="success" message="Thành Công" :dismissible="'true'" /> --}}
        </div>

    </div>

    {{-- @if (true)
        @php
        dd(Session::all('message','full_name'))
        @endphp
    @endif --}}


    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Liệt kê danh mục</h6>
                </div>
                <div class="p-3">
                    <div class="row mx-md-n5">
                        <div class="col px-md-5">
                            <div class="p-3 border bg-light">
                                <a href="users/create" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                    <span class="text">Create user</span>
                                </a>
                            </div>
                        </div>
                        <div class="col px-md-5">
                            <div class="p-3 border bg-light">
                                <a href="profiles/create" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                    <span class="text">Add profile</span>
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
                                <th>Email</th>
                                <th>Password</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a onclick="checkAvaProfile({{ $user->id }})">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <input name="viewPass" type="password" readonly value="{{ $user->password }}">
                                    </td>
                                    <td>
                                        <a href="profiles/{{ $user->id }}/edit" class="btn btn-success btn-icon btn-sm"
                                            role="button">
                                            <span class="icon">
                                                <i class="fas fa-user-edit"></i>
                                            </span>
                                            Edit
                                        </a>
                                    </td>

                                    <td>
                                        <form class="user" action="users/{{ $user->id }}" method="POST">
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
                                        <button class="btn btn-light btn-icon btn-sm" name="dynamic">
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
    <script>
        var myButton = document.getElementsByName('dynamic');
        var myInput = document.getElementsByName('viewPass');
        myButton.forEach(function(element, index) {
            element.onclick = function() {
                'use strict';

                if (myInput[index].type == 'password') {
                    myInput[index].setAttribute('type', 'text');
                    element.firstChild.textContent = 'Hide';
                    element.firstChild.className = "fas fa-eye";

                } else {
                    myInput[index].setAttribute('type', 'password');
                    element.firstChild.textContent = '';
                    element.firstChild.className = "";
                }
            }
        })

    </script>
@endsection
