@extends('layout_backend.master')
@section('title', 'Tạo mới product')
@section('content-title',isset($product) ? 'Sửa product' : 'Tạo mới product')

@section('content')
@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
    <form action="{{isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store')}}" 
    method="POST" enctype="multipart/form-data">
    @if (isset($product))
    @method('PUT')   
   @endif
        @csrf
        <div class="form-group">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control" value="{{isset($product) ? $product->name : old('name')}}">
        </div>
        <div class="form-group">
            <label for="">Gía</label>
            <input type="text" name="price" class="form-control"value="{{isset($product) ? $product->price : old('price')}}">
        </div>   
        <div class="form-group">
            <label for="">Ảnh</label>
            <input type="file" name="thumbnail_url" class="form-control">
            <img src="{{isset($product) ? asset($product->thumbnail_url) : ''}}" alt="" width="100px">

        </div>
        <div class='form-group'>
            <label for="">Categogry</label>
            <select name="category_id" class="form-control">
                <option >Chon danh muc:</option>
                @foreach ($categories as $cat)
                    <option value="{{$cat->id}}" {{isset($product) ? $product->category_id : old('category_id')}} >{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Content</label>
            <textarea name="content" id="content">{{isset($product) ? $product->content : old('content')}}</textarea>
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <input type="radio" name="status" value="1" {{isset($product) && $product->status == 1 ? 'checked' : ''}}>Ẩn
            <input type="radio" name="status" value="0" {{isset($product) && $product->status == 1 ? 'checked' : ''}}>Hiện
        </div>
        <div>
            <button class="btn btn-primary">{{isset($product) ? 'Lưu' : 'Tạo mới'}}</button>
            <button type="reset" class="btn btn-warning">Nhập lại</button>
        </div>
    </form>
@endsection

@section('custom-js')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
