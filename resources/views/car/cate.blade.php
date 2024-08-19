@extends('layout.main')

@section('title')

@endsection

@section('content')
<nav id="navigation">
			<!-- container -->
			<div class="container">
               
               
				
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
<div class="col-md-12">
    <div class="row">
        <div class="products-tabs">
            <!-- tab -->
            <div id="tab1" class="tab-pane active">
                <div class="products-slick" data-nav="#slick-nav-1">
                @foreach ( $data as $dt)
                    <!-- product -->
                    <div class="product">
                       
                        
                      
                        <div class="product-img">
                        <img src="{{Storage::url($dt->image)}}" alt="" width="50px" height="200px">
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">NEW</span>
                            </div>
                        </div>
                       
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">{{$dt->name}}</a></h3>
                            <h4 class="product-price">{{$dt->price}} <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                        <a href="{{route('cars.edit', $dt->id)}}">
                            <button class="btn btn-success">Xem</button>
                        </a>
                            </div>
                           
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                      
                    </div>
                    @endforeach
                    <!-- /product -->

                  
                    <!-- /product -->
                </div>
                <div id="slick-nav-1" class="products-slick-nav"></div>
            </div>
            <!-- /tab -->
        </div>
    </div>
</div>
@endsection
@section('footer')

@endsection
