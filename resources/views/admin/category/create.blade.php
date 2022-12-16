@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">{{ __('labels.category-add') }}</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ url('admin/category') }}" class="btn btn-sm btn-outline-secondary">{{ __('labels.back') }}</a>
   </div>
</div>
<form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
      <div class="col-md-6 mb-3">
         <label>Tên</label>
         <input type="text" name="name" class="form-control">
         @error('name')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-6 mb-3">
         <label>Slug</label>
         <input type="text" name="slug" class="form-control">
         @error('slug')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-12 mb-3">
         <label>Mô tả</label>
         <textarea name="description" rows="5" class="form-control"></textarea>
         @error('description')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-6 mb-3">
         <label>Hình ảnh</label>
         <input type="file" name="image" class="form-control">
         @error('image')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-6 mb-3">
         <label>Trạng thái</label><br>
         <input type="checkbox" name="status"> Chọn=Ẩn, Bỏ chọn=Hiển thị
      </div>
      <div class="col-md-12 mb-3">
         <hr>
         <h4>SEO Tags</h4>
      </div>
      <div class="col-md-12 mb-3">
         <label>Meta Title</label>
         <input type="text" name="meta_title" class="form-control">
         @error('meta_title')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-12 mb-3">
         <label>Meta Keyword</label>
         <textarea type="text" name="meta_keyword" class="form-control"></textarea>
         @error('meta_keyword')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-12 mb-3">
         <label>Meta Description</label>
         <textarea type="text" name="meta_description" class="form-control"></textarea>
         @error('meta_description')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-12 mb-3">
         <button type="submit" class="btn btn-primary float-right">Lưu</button>
      </div>
   </div>
</form>
@endsection