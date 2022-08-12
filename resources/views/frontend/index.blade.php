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
    </div>
            <div id="fh5co-started">
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>Newsletter</h2>
                            <p>Just stay tune for our latest Product. Now you can subscribe</p>
                        </div>
                    </div>
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2">
                            <form class="form-inline">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	
	@endsection