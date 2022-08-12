@extends('layout_backend.master')

@section('title', 'Quản lý danh mục')

@section('content-title', 'Quản lý danh mục')

@section('content')
    <div>
        <a href="{{route('admin.categorys.create')}}">
            <button class="btn btn-success">Tạo mới</button>
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category_list as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('admin.categorys.edit', $category->id)}}">
                            <button class="btn btn-warning">Sửa</button>
                        </a>
                        <form action="{{route('admin.categorys.delete', $category->id)}}" method="POST">
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
        {{$category_list->links()}}
    </div>
@endsection