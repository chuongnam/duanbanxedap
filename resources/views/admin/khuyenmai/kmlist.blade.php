@extends('layout.index')

@section('title')

@endsection

@section('content')
<div class="be-content">
<table class="table table-bordered">

      <a href="{{route('km.add')}}" class="btn btn-danger">thêm</a>
  
  <tr>
    <th>id</th>
    <th>mã giảm giá</th>
    <th>phần trăm</th>
    <th>action</th>
    
  </tr>
  @foreach ($data as $dt)
  <tr>
    <td>{{$dt->id}}</td>
    <td>{{$dt->magiamgia}}</td>
    <td>{{$dt->phantram}}</td>
    <td>
      <a href="{{route('km.delete', $dt->id)}}" class="btn btn-success">XÓA</a>
      <a href="{{route('km.edit', $dt->id)}}" class="btn btn-danger">SỬA</a>
    </td>
  </tr>
  @endforeach
  
</table>
</div>
@endsection
@section('footer')

@endsection