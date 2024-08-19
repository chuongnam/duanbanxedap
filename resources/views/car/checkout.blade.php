@extends('layout.main')

@section('title')
    Thanh Toán
@endsection

@section('content')
<div class="container">
    <h1 class="my-4">Thanh Toán</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Hiển thị giỏ hàng và thông tin thanh toán -->
    <div class="row">
        <!-- Giỏ hàng -->
        <div class="col-md-6">
            @if (!empty($cars))
                <div class="cart-details">
                    <h3 class="mb-4">Giỏ hàng</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                @php
                                    $quantity = $cart[$car->id] ?? 0;
                                    $totalPrice = $car->price * $quantity;
                                @endphp
                                <tr>
                                    <td>{{ $car->name }}</td>
                                    <td>
                                    <img src="{{Storage::url($car->image)}}"  style="width: 100px; height: auto;">
                                    </td>
                                    <td>{{ number_format($car->price) }} VND</td>
                                    <td>{{ $quantity }}</td>
                                    <td>{{ number_format($totalPrice) }} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="form-group">
                        <h3>Tổng tiền: {{ number_format($total) }} VND</h3>
                    </div>
                </div>
            @else
                <div class="alert alert-info">Giỏ hàng của bạn hiện tại trống.</div>
            @endif
        </div>

        <!-- Thông tin thanh toán -->
        <div class="col-md-6">
            @if (!empty($cars))
                <div class="payment-details">
                    <h3 class="mb-4">Thông tin thanh toán</h3>
                    <form action="{{ route('cart.processCheckout') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ Và Tên:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_address">Địa chỉ giao hàng:</label>
                            <input type="text" name="shipping_address" id="shipping_address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại:</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Phương thức thanh toán:</label>
                            <select name="payment_method" id="payment_method" class="form-control" required>
                                <option value="cod">thanh toán khi nhận hàng</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="trangthao">Phương thức thanh toán:</label>
                            <select name="trangthai" id="trangthao" class="form-control" required>
                                <option value="chờ xác nhận">chờ xác nhận</option>
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Thanh toán</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('footer')
<style>
    .cart-details {
        padding: 15px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .payment-details {
        padding: 15px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .table th, .table td {
        text-align: center;
    }

    .table img {
        max-width: 100px;
        height: auto;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
</style>
@endsection
