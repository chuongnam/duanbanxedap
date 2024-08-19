@extends('layout.index')

@section('title')

@endsection

@section('content')
<div class="be-content">
<table class="table table-bordered">

      <a href="{{route('carss.add')}}" class="btn btn-danger">thêm</a>
  
  <tr>
    <th>id</th>
    <th>name</th>
    <th>price</th>
    <th>mota</th>
    <th>image</th>
    <th>color</th>
    <th>categoris</th>
    <th>action</th>
    
  </tr>
  @foreach ($data as $dt)
  <tr>
    <td>{{$dt->id}}</td>
    <td>{{$dt->name}}</td>
    <td>{{$dt->price}}</td>
    <td>{{$dt->mota}}</td>
   
    <td>
    <img src="{{Storage::url($dt->image)}}" alt="" width="50px">
    </td>
    <td>{{$dt->mausac}}</td>
    <td>{{$dt->name_danhmuc}}</td>
    <td>
      <a href="{{route('carss.delete', $dt->id)}}" class="btn btn-success"><i class="mdi-delete-empty"></i>XÓA</a>
      <a href="{{route('carss.edit', $dt->id)}}" class="btn btn-danger"><i class="mdi-delete-empty"></i>sửa</a>
     
     
    </td>
  </tr>
  @endforeach
  
</table>
</div>
@endsection
@section('footer')

@endsection