@extends('admin_layout')
@section('admin_content')

<p>{{$user->name}}</p>
<p>{{$user->email}}</p>
<p>{{$user->created_at}}</p>

@endsection