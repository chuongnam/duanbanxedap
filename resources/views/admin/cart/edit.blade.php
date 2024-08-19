@extends('layout.index')

@section('title')

@endsection

@section('content')
<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">THÊM CATEGORIS</h2>

    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header card-header-divider">Masks Types<span class="card-subtitle">Different input
                            mask types</span></div>
                    <div class="card-body">
                        <form action="{{route('cartt.update', $data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="mb-3">
                                    <label for="name" class="form-label">họ và tên</label>
                                    <input  class="form-control" id="name"
                                        name="name" value="{{$data->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="mb-3">
                                    <label for="shipping_address" class="form-label">địa chỉ</label>
                                    <input  class="form-control" id="name"
                                        name="shipping_address	" value="{{$data->shipping_address}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">số điện thoại</label>
                                    <input class="form-control" id="name" placeholder="tên danh mục"
                                        name="phone_number" value="{{$data->phone_number}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="mb-3">
                                    <label for="payment_method" class="form-label">payment_method</label>
                                    <input type="text" class="form-control" id="payment_method"
                                        name="payment_method" value="{{$data->payment_method}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="mb-3">
                                    <label for="total" class="form-label">total</label>
                                    <input type="text" class="form-control" id="name"
                                        name="total" value="{{$data->total}}">
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="trangthai">Phương thức thanh toán:</label>
                            <select name="trangthai" id="trangthao" class="form-control" required>
                                <option value="chờ xác nhận" value="{{$data->trangthai}}">chờ xác nhận</option>
                                <option value="đang gia hàng" value="{{$data->trangthai}}">đang giao hàng</option>
                                
                            </select>
                        </div>
                            <button class="btn btn-danger" type="submit" value="submit">SỬA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')

@endsection