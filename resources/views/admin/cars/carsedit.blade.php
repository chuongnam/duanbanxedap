@extends('layout.index')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">CHỈNH SỬA SẢN PHẨM</h2>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-border-color card-border-color-primary">
                    <div class="card-body">
                        <form action="{{ route('carss.update', ['id' => $car->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm" name="name" value="{{ old('name', $car->name) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Giá</label>
                                    <input type="text" class="form-control" id="price" placeholder="Giá" name="price" value="{{ old('price', $car->price) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="mota" class="form-label">Mô tả</label>
                                    <textarea class="form-control" id="mota" placeholder="Mô tả" name="mota" required>{{ old('mota', $car->mota) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="mausac" class="form-label">Màu sắc</label>
                                    <input type="text" class="form-control" id="mausac" placeholder="Màu sắc" name="mausac" value="{{ old('mausac', $car->mausac) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="iddm" class="form-label">Danh mục</label>
                                    <select class="form-control" id="iddm" name="iddm" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->iddm }}" {{ $car->iddm == $category->iddm ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Hình ảnh</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if($car->image)
                                        <img src="{{ Storage::url($car->image) }}" style="width: 100px; height: auto;" alt="Car Image">
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
