@extends('layout.main')

@section('title')
@endsection

@section('content')
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Headphones</a></li>
                    <li class="active">Product name goes here</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <!-- Product Images -->
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2 col-md-pull-5">
                <div id="product-imgs">
                <img src="{{Storage::url($detail->image)}}" alt="" width="100px" height="100px">
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$detail->name}}</h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Review(s) | Add your review</a>
                    </div>
                    <div>
                        <h3 class="product-price"><del class="product-old-price">{{$detail->price}}</del></h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>

                    <div class="product-options">
                        <label>
                            Size
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label>
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div>

                    <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="post">
                        @csrf
                        <input type="hidden" id="car-id" name="id" value="{{$detail->id}}">
                        <input type="number" id="car-quantity" value="1" name="quantity">
                        <button id="add-to-cart-button" type="submit" class="btn btn-danger">Thêm vào giỏ</button>
                    </form>

                    <ul class="product-btns">
                        <!-- Wishlist and Compare Links -->
                    </ul>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="#">Headphones</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab2">Details</a></li>
                        <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <!-- Description Content -->
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <!-- Details Content -->
                        </div>
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <!-- Reviews Content -->
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@section('footer')
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#add-to-cart-form').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: "{{ route('cart.add') }}",
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    // Show success message
                    alert(response.message);
                } else {
                    // Handle case where response is not successful
                    alert('Có lỗi xảy ra. Vui lòng thử lại.');
                }
            },
            error: function(xhr) {
                alert('Có lỗi xảy ra. Vui lòng thử lại.');
            }
        });
    });
});
</script>
@endsection

@endsection
