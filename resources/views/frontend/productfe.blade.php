@extends('frontend.main')
@section('content')
	
    <div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Products.</h2>
				</div>
			</div>
            <div class="row">
                <div class="col-md-3">
                    <label for="amount">Lọc theo danh mục</label>
                    <form action="">
                        <select name="sort" id="sort" class="form-control">
                            <option value="">Sofa</option>
                            <option value="">Bàn ăn</option>
                            <option value="">Tủ quần áo</option>
                            <option value="">Tủ giày</option>
                            <option value="">Thảm</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-3">
                    <label for="amount">Lọc theo kích thước</label>
                    <form action="">
                        <select name="sort" id="sort" class="form-control">
                            <option value="">Lớn</option>
                            <option value="">Vừa</option>
                            <option value="">Nhỏ</option>
                        </select>
                    </form>
                </div>
				<button>Lọc</button>
            </div>
            <hr>
			<div class="row">
                @foreach ($product as $pro)

                <div class="col-md-4 text-center animate-box">
                    <div class="product">
                       
                        <div class="product-grid" style="background-image:url({{$pro->thumbnail_url}});">
                            <div class="inner">
                                <p>
                                    <a href="{{route('detail')}}" class="icon"><i class="icon-shopping-cart"></i></a>
                                    <a href="{{route('detail')}}" class="icon"><i class="icon-eye"></i></a>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3><a href="{{route('detail')}}">{{$pro->name}}</a></h3>
                            <span class="price">{{number_format($pro->price)}}</span>
                        </div>
                     

                    </div>
                </div>
                @endforeach
 
            </div>
	</div>

@endsection
