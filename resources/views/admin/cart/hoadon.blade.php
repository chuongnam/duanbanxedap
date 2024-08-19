@extends('layout.index')

@section('title')
Hóa Đơn Chi Tiết
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="be-content">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="invoice-container p-4">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>Hóa Đơn Chi Tiết</h1>
                            <p class="text-muted">Mã hóa đơn: {{ $order->id }}</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Thông Tin Khách Hàng</h5>
                            <p><strong>Họ và tên:</strong> {{ $order->name }}</p>
                            <p><strong>Địa chỉ:</strong> {{ $order->shipping_address }}</p>
                            <p><strong>Số điện thoại:</strong> {{ $order->phone_number }}</p>
                            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                            <p><strong>Tổng tiền:</strong> {{ number_format($order->total) }} VND</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h5>Thông Tin Đơn Hàng</h5>
                            <p><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
                            <p><strong>Hạn thanh toán:</strong> {{ $order->updated_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Hình Ảnh</th>
                                        <th>Đơn Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($order->items, true) as $carId => $quantity)
                                        @php
                                            $car = \App\Models\Car::find($carId);
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $car->name }}</td>
                                            <td>
                                                <img src="{{ Storage::url($car->image) }}" style="width: 100px; height: auto;">
                                            </td>
                                            <td>{{ number_format($car->price) }} VND</td>
                                            <td>{{ $quantity }}</td>
                                            <td>{{ number_format($car->price * $quantity) }} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                        <a href="{{ route('cartt.print', ['id' => $order->id]) }}" class="btn btn-primary">In Hóa Đơn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</div>

<style>
    .invoice-container {
        border: 2px solid #000;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }

    .table {
        margin-bottom: 0;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
        padding: 10px;
    }

    .table-dark {
        background-color: #343a40;
        color: #fff;
    }

    .table-dark th,
    .table-dark td {
        border-color: #454d55;
    }

    h1, h5 {
        margin-bottom: 1rem;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .badge {
        padding: 0.5em 1em;
        border-radius: 0.25rem;
        font-size: 0.875em;
        color: #fff;
    }

    .badge.pending {
        background-color: #ffc107; /* Vàng cho trạng thái chờ */
    }

    .badge.in-progress {
        background-color: #007bff; /* Xanh dương cho trạng thái đang tiến hành */
    }

    .badge.completed {
        background-color: #28a745; /* Xanh lá cho trạng thái đã hoàn thành */
    }

    .badge.cancelled {
        background-color: #dc3545; /* Đỏ cho trạng thái đã hủy */
    }
</style>
@endsection

@section('footer')
@endsection
