@extends('layout.index')

@section('title')

@endsection

@section('content')
<div class="be-content">
<table class="table table-bordered">

    
  
  <tr>
    <th>id</th>
    <th>họ và tên</th>
    <th>địa chỉ</th>
    <th>số điện thoại</th>
    <th>phương thức thanh toán</th>
    <th>tổng tiền</th>
    <th>trạng thái</th>
    <th>action</th>
    
  </tr>
  @foreach ($data as $dt)
  <tr>
    <td>{{$dt->id}}</td>
    <td>{{$dt->name}}</td>
    <td>{{$dt->shipping_address	}}</td>
    <td>{{$dt->phone_number	}}</td>
    <td>{{$dt->payment_method}}</td>
    <td>{{$dt->total}}</td>
    <td>{{$dt->trangthai}}</td>
    <td>
        <a href="{{route('cartt.edit',$dt->id)}}" class="btn btn-success">trạng thái</a>
        <a href="{{route('cartt.detail',$dt->id)}}" class="btn btn-danger">in hóa đơn</a>
    </td>
  </tr>
  
  @endforeach
  
  
</table>
</div>
@endsection
@section('footer')

@endsection