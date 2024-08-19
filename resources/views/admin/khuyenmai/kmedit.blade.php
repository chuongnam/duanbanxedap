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
                        <form action="{{route('km.update',$data->id)}}" method="POST">
                            @csrf
                            @METHOD('PUT')
                            <div class="mb-3 mt-3">
                                <label for="magiamgia" class="form-label">Mã giảm giá:</label>
                                <input type="text" class="form-control" id="magiamgia" placeholder="mã giảm giá"
                                    name="magiamgia" value="{{$data->magiamgia}}">
                            </div>
                            <div class="mb-3">
                                <label for="phantram" class="form-label">Password:</label>
                                <input type="text" class="form-control" id="phantram" placeholder="phần trăm"
                                    name="phantram" value="{{$data->phantram}}">
                            </div>
                            
                            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
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