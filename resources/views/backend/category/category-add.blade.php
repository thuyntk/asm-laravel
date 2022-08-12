@extends('layout_backend.master')
@section('title', 'Tạo mới danh mục')
@section('content-title', isset($category) ? 'Sửa danh mục' : 'Tạo mới danh mục')

@section('content')
@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
    <form action="{{isset($category) ? route('admin.categorys.update', $category->id) : route('admin.categorys.store')}}" method="POST" enctype="multipart/form-data">
        @if (isset($category))
         @method('PUT')   
        @endif
        @csrf
        <div class="form-group">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control" value="{{isset($category) ? $category->name : old('name')}}" >
            
        </div>
        <div>
            <button class="btn btn-primary">{{isset($category) ? 'Lưu' : 'Tạo mới'}}</button>
            <button type="reset" class="btn btn-warning">Nhập lại</button>
        </div>
    </form>
@endsection
