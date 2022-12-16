@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">{{ __('labels.slider-edit') }}</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ url('admin/slider') }}" class="btn btn-sm btn-outline-secondary">{{ __('labels.back') }}</a>
   </div>
</div>
<form action="{{ url('admin/slider/'.$slider->id) }}" method="POST" enctype="multipart/form-data">       
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tiêu đề</label>
        <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
        @error('title')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Hình ảnh</label>
        <div class="row">
            <div class="col-6">
                <input type="file" name="image" class="form-control">
                @error('image')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="col-6">
                <img src="{{ asset($slider->image) }}" alt="Slider Image" class="img-thumbnail" width="{{ env('IMG_EDIT_WIDTH') }}">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea type="text" name="description" class="form-control" rows="5">{{ $slider->description }}</textarea>
        @error('description')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Trạng thái</label><br>
        <input type="checkbox" name="status" {{ $slider->status == 1 ? 'checked' : '' }}> Chọn=Ẩn, Bỏ chọn=Hiển thị
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>

</form>
@endsection