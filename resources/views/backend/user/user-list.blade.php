@extends('layout_backend.master')

@section('title', 'Quản lý người dùng')

@section('content-title', 'Quản lý người dùng')

@section('content')
    <div>
        <a href="{{route('admin.users.create')}}">
            <button class="btn btn-success">Tạo mới</button>
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Quyền</th>
                <th>Trạng thái</th>
                <th>Avatar</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_list as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ?: 'NA'}}</td>
                    <td>{{$user->status ?: 'NA'}}</td>
                    <td><img src="{{asset($user->avatar)}}" alt="" width="100"></td>
                    <td>
                        <a href="{{route('admin.users.edit', $user->id)}}">
                            <button class="btn btn-warning">Sửa</button>
                        </a>
                        <form action="{{route('admin.users.delete', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$user_list->links()}}
    </div>
@endsection