@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">{{ __('labels.post-add') }}</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ url('admin/post') }}" class="btn btn-sm btn-outline-secondary">{{ __('labels.back') }}</a>
   </div>
</div>
<form action="{{ url('admin/post') }}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
      <div class="col-md-6 mb-3">
         <label>Title</label>
         <input type="text" name="title" class="form-control">
         @error('title')
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
      <div class="mb-3 col-6">
            <label>Taxonomy</label>
            <select name="taxonomy_id" class="form-control">
               <option>--Select Taxonomy--</option>   
                @foreach($taxonomies as $taxonomy)
                  <option value="{{ $taxonomy->id }}">{{ $taxonomy->name }}</option>
                @endforeach
            </select>
      </div>
      <div class="col-md-6 mb-3">
         <label>Trạng thái</label><br>
         <input type="checkbox" name="status"> Chọn=Ẩn, Bỏ chọn=Hiển thị
      </div>
      <div class="col-md-12 mb-3">
         <label>Nội dung</label>
         <textarea name="content" rows="5" class="form-control" id="editor"></textarea>
         @error('content')
         <small class="text-danger">{{$message}}</small>
         @enderror
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
         <label>Meta Content</label>
         <textarea type="text" name="meta_content" class="form-control"></textarea>
         @error('meta_content')
         <small class="text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="col-md-12 mb-3">
         <button type="submit" class="btn btn-primary float-right">Lưu</button>
      </div>
   </div>
</form>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script>
            ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection