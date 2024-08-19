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
                <div class="card-header card-header-divider">Masks Types<span class="card-subtitle">Different input mask types</span></div>
                <div class="card-body">
                  <form action="{{route('cate.update',$data->iddm)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                    <div class="mb-3">
                                <label for="phantram" class="form-label">tên danh mục</label>
                                <input type="text" class="form-control" id="name" placeholder="tên danh mục"
                                    name="name" value="{{$data->name}}">
                            </div>
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