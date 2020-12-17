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
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                        <a data-toggle="modal" data-target="#exampleModalLong" class="btn btn-light btn-icon-split">
                            <span class="icon text-gray-600">
                                <i class="fas fa-search"></i>
                            </span>
                            <span class="text">Filter Order</span>
                        </a>

                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Filter Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('orders.filter') }}" method="POST">
                                            @method('POST')
                                            @csrf
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="sel1">Filter with status</label>
                                                    <select class="form-control" name="List_of_Status">

                                                        <option value=""></option>
                                                        <option value="Canceled">Canceled</option>
                                                        <option value="Unresolved">Unresolved</option>
                                                        <option value="Expires">Expires</option>
                                                        <option value="Refund">Refund</option>
                                                        <option value="Completion">Completion</option>
                                                        <option value="Processed">Processed</option>
                                                        <option value="Processed">quo</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Date Created At</label>
                                                    <input type="date" class="form-control form-control-user"
                                                        name="dateStart" id="profile_birthday" placeholder="Birthday">

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Date Updated At</label>
                                                    <input type="date" class="form-control form-control-user" name="dateEnd"
                                                        id="profile_birthday" placeholder="Birthday">

                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Created At</th>
                                <th>Update At</th>
                                <th>Status</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Created At</th>
                                <th>Update At</th>
                                <th>Status</th>
                                <th></th>

                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($orders as $order)
                                <tr id="element-{{ $order->id }}">
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td>{{ $order->status }}</td>
                                    
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
