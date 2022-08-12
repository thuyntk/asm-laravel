@extends('layout_backend.master')

@section('title', 'Quản lý product')

@section('content-title', 'Quản lý product')

@section('content')
<div>
    <a href="{{route('admin.products.create')}}">
        <button class='btn btn-success'>Tạo mới</button>
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Gía</th>
            <th>Avatar</th>
            <th>Content</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product_list as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td><img src="{{asset($product->thumbnail_url)}}" alt="" width="100"></td>
                <td>{{$product->content}}</td>
                <td>{{$product->status ?: 'NA'}}
                    
                </td>
                <td>
                    <a href="{{route('admin.products.edit', $product->id)}}">
                        <button class="btn btn-warning">Sửa</button>
                    </a>
                    <form action="{{route('admin.products.delete', $product->id)}}" method="POST">
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
    {{$product_list->links()}}
</div>
@endsection