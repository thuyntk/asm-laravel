@extends('layout_backend.master')
@section('title', 'Tạo mới người dùng')
@section('content-title', isset($user) ? 'Sửa người dùng' : 'Tạo mới người dùng')

@section('content')
@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
    <form action="{{isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store')}}" 
        method="POST" enctype="multipart/form-data">
        @if (isset($user))
         @method('PUT')   
        @endif
        @csrf
        <div class="form-group">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control" value="{{isset($user) ? $user->name : old('name')}}" >
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{isset($user) ? $user->email : old('email')}}">
        </div>
        <div class="form-group">
            <label for="">Mật khấu</label>
            <input type="password" name="password" class="form-control" value="{{ old('password')}}">
        </div>
        <div class="form-group">
            <label for="">Ảnh đại diện</label>
            <input type="file" name="avatar" class="form-control">
            <img src="{{isset($user) ? asset($user->avatar) : ''}}" alt="" width="100px">
        </div>
        <div class="form-group">
            <label for="">Phân quyền</label>
            <input type="radio" name="role" value="1" {{isset($user) && $user->role == 1 ? 'checked' : ''}}>Admin
            <input type="radio" name="role" value="0" {{isset($user) && $user->role == 0 ? 'checked' : ''}}>User
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <input type="radio" name="status" value="1" {{isset($user) && $user->status == 1 ? 'checked' : ''}}>Kích hoạt
            <input type="radio" name="status" value="0" {{isset($user) && $user->status == 0 ? 'checked' : ''}}>Không kích hoạt
        </div>
        <div>
            <button class="btn btn-primary">{{isset($user) ? 'Lưu' : 'Tạo mới'}}</button>
            <button type="reset" class="btn btn-warning">Nhập lại</button>
        </div>
    </form>
@endsection
