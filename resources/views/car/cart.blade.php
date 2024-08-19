@extends('layout.main')

@section('title')
  
@endsection

@section('content')
<h1>Giỏ Hàng</h1>

@if ($cars->isEmpty())
    <div class="alert alert-info">Giỏ hàng của bạn hiện tại trống.</div>
    <a href="{{ route('cars.index') }}" class="btn btn-success">Tiếp tục mua hàng</a>
@else
<form action="{{ route('cart.updateCart') }}" method="POST">
    @csrf
    <table class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                @php
                    $quantity = $cart[$car->id] ?? 0; // Số lượng trong giỏ hàng
                    $totalPrice = floatval($car->price) * $quantity; // Thành tiền
                @endphp
               <tr>
                <td>{{ $car->name }}</td>
                <td>
                    <img src="{{Storage::url($car->image)}}"  style="width: 100px; height: auto;">
                </td>
                <td>{{ number_format($car->price) }} VND</td>
                <td>
                    <input type="number" name="cart[{{ $car->id }}]" value="{{ $quantity }}" min="1" required>
                </td>
                <td>{{ number_format($totalPrice) }} VND</td>
                <td>
                    <a href="{{ route('cart.removeItem', $car->id) }}" class="btn btn-danger">Xóa</a>
                </td>
               </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total">
        <h3>Tổng tiền: {{ number_format($total) }} VND</h3>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button>
    <a href="{{ route('cars.index') }}" class="btn btn-success">Tiếp tục mua hàng</a>
    <a href="{{ route('cart.checkoutForm') }}" class="btn btn-danger mt-3">Thanh toán</a>
</form>
@endif
@endsection

@section('footer')
@endsection
