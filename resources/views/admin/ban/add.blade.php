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

                    <div class="card-body">
                        <form action="{{route('ban.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="mb-3">
                                    <label for="phantram" class="form-label">tên banner</label>
                                    <input type="text" class="form-control" id="name" placeholder="tên sản phẩm"
                                        name="tenbanner">
                                </div>
                          
                                 
                                <div class="mb-3">
                                    <label for="phantram" class="form-label">image</label>
                                    <input type="file" class="form-control" id="image" placeholder="image" name="image">
                                </div>
                               

                            </div>
                            <button class="btn btn-danger" type="submit" value="submit">SUBMIT</button>
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