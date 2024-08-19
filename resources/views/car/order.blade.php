<!-- resources/views/car/order.blade.php -->

@extends('layout.main')

@section('title')

@endsection

@section('content')
<h1>Chi Tiết Đơn Hàng</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="order-details">
    <h2>Đơn Hàng #{{ $order->id }}</h2>
    <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
    <p><strong>Số điện thoại:</strong> {{ $order->phone_number }}</p>
    <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($order->total) }} VND</p>

    <h3>Danh Sách Sản Phẩm:</h3>
    <table class="table">
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
            @foreach (json_decode($order->items, true) as $carId => $quantity)
                @php
                    $car = \App\Models\Car::find($carId);
                @endphp
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>
                    <img src="{{Storage::url($car->image)}}"  style="width: 100px; height: auto;">
                    <td>{{ number_format($car->price) }} VND</td>
                    <td>{{ $quantity }}</td>
                    <td>{{ number_format($car->price * $quantity) }} VND</td>
                </tr>
            @endforeach
        </tbody>
       
    </table>
    <a href="{{route('cars.index')}}" class="btn btn-danger">tiếp tục mua hàng</a>
</div>

@endsection

@section('footer')
@endsection
