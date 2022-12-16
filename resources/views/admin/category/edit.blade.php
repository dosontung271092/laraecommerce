@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">{{ __('labels.category-edit') }}</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ url('admin/category') }}" class="btn btn-sm btn-outline-secondary">{{ __('labels.back') }}</a>
   </div>
</div>
<form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')
   <div class="row">
      <div class="col-md-6 mb-3">
         <label>Tên</label>
         <input type="text" name="name" class="form-control" value="{{ $category->name }}">
         @error('name')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-6 mb-3">
         <label>Slug</label>
         <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
         @error('slug')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-12 mb-3">
         <label>Mô tả</label>
         <textarea name="description" rows="5" class="form-control">{{ $category->description }}</textarea>
         @error('description')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-6 mb-3">
            <label>Hình ảnh</label>
            <div class="row">
                <div class="col-6">
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-6">
                    @if( $category->image )
                        <img src="{{ asset($category->image) }}" alt="Category Image" class="img-thumbnail" width="{{ env('IMG_EDIT_WIDTH') }}">
                    @endif
                </div>
            </div>
      </div>
      <div class="col-md-6 mb-3">
         <label>Trạng thái</label><br>
         <input type="checkbox" name="status" {{ ( $category->status ) ? 'checked' : '' }}> Chọn=Ẩn, Bỏ chọn=Hiển thị
      </div>
      <div class="col-md-12 mb-3">
         <hr>
         <h4>SEO Tags</h4>
      </div>
      <div class="col-md-12 mb-3">
         <label>Meta Title</label>
         <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}">
         @error('meta_title')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-12 mb-3">
         <label>Meta Keyword</label>
         <textarea type="text" name="meta_keyword" class="form-control">{{ $category->meta_keyword }}</textarea>
         @error('meta_keyword')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-12 mb-3">
         <label>Meta Description</label>
         <textarea type="text" name="meta_description" class="form-control">{{ $category->meta_description }}</textarea>
         @error('meta_description')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-12 mb-3">
         <button type="submit" class="btn btn-primary float-right">Update</button>
      </div>
   </div>
</form>
@endsection