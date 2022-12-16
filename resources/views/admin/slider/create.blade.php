@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">{{ __('labels.slider-add') }}</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ url('admin/slider') }}" class="btn btn-sm btn-outline-secondary">{{ __('labels.back') }}</a>
   </div>
</div>
<form action="{{ url('admin/slider') }}" method="POST" enctype="multipart/form-data">
    
    @csrf

    <div class="mb-3">
        <label>Tiêu đề</label>
        <input type="text" name="title" class="form-control">
        @error('title')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Hình ảnh</label>
        <small class="text-danger">(Kích thước 1200 x 400)</small>
        <input type="file" name="image" class="form-control">
        @error('image')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea type="text" name="description" class="form-control" rows="5"></textarea>
        @error('description')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Trạng thái</label><br>
        <input type="checkbox" name="status"> Chọn=Ẩn, Bỏ chọn=Hiển thị
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>

</form>
@endsection