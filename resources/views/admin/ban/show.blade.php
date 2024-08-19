@extends('layout.index')

@section('title')

@endsection

@section('content')
<div class="be-content">
<table class="table table-bordered">

      <a href="{{route('ban.add')}}" class="btn btn-danger">thêm</a>
  
  <tr>
    <th>id</th>
    <th>ten banner</th>
    <th>image</th>
    <th>action</th>
    
  </tr>
  @foreach ($data as $dt)
  <tr>
<td>{{$dt->id}}</td>
    <td>{{$dt->tenbanner}}</td>
  
   
    <td>
    <img src="{{Storage::url($dt->image)}}" alt="" width="50px">
    </td>
   
    <td>
      <a href="{{route('ban.delete', $dt->id)}}" class="btn btn-success"><i class="mdi-delete-empty"></i>XÓA</a>
      <a href="{{route('ban.edit', $dt->id)}}" class="btn btn-danger">SỬA</a>
    </td>
  </tr>
  @endforeach
  
</table>
</div>
@endsection
@section('footer')

@endsection