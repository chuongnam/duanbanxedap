@extends('layout.index')

@section('title', 'Chỉnh sửa Banner')

@section('content')
<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">CHỈNH SỬA BANNER</h2>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-border-color card-border-color-primary">
                    <div class="card-body">
                        <form action="{{ route('ban.update', ['id' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="mb-3">
                                    <label for="tenbanner" class="form-label">Tên Banner</label>
                                    <input type="text" class="form-control" id="tenbanner" placeholder="Tên Banner" name="tenbanner" value="{{ old('tenbanner', $banner->tenbanner) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Hình ảnh</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if($banner->image)
                                        <img src="{{ Storage::url($banner->image) }}" style="width: 100px; height: auto;" alt="Banner Image">
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-danger" type="submit">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
