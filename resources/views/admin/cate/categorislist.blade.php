@extends('layout.index')

@section('title')

@endsection

@section('content')
<div class="be-content">
<table class="table table-bordered">

      <a href="{{route('cate.add')}}" class="btn btn-danger">thêm</a>
  
  <tr>
    <th>id</th>
    <th>name</th>
    <th>action</th>
    
  </tr>
  @foreach ($data as $dt)
  <tr>
    <td>{{$dt->iddm}}</td>
    <td>{{$dt->name}}</td>
    <td>
      <a href="{{route('cate.delete', $dt->iddm)}}" class="btn btn-success"><i class="mdi-delete-empty"></i>XÓA</a>
      <a href="{{route('cate.edit', $dt->iddm)}}" class="btn btn-danger">SỬA</a>
    </td>
  </tr>
  @endforeach
  
</table>
</div>
@endsection
@section('footer')

@endsection