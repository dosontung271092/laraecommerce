@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">{{ __('labels.product-add') }}</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ url('admin/product') }}" class="btn btn-sm btn-outline-secondary">{{ __('labels.back') }}</a>
   </div>
</div>

<form action="{{ url('admin/product') }}" method="POST" enctype="multipart/form-data">    
    @csrf

    <div class="row">
        <div class="mb-3 col-6">
            <label>Tên</label>
            <input type="text" name="name" class="form-control">
            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3 col-6">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
            @error('slug')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3 col-6">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-6">
            <label>Nhãn hiệu</label>
            <select name="brand_id" class="form-control">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-12">
            <label>Mô tả ngắn</label>
            <textarea type="text" name="small_description" class="form-control"></textarea>
            @error('small_description')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3 col-12">
            <label>Mô tả</label>
            <textarea type="text" name="description" class="form-control" rows="10" id="editor"></textarea>
            @error('description')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-4 mb-3">
            <label>Tải hình ảnh</label>
            <input type="file" multiple name="image[]" class="form-control">
            @error('image')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3 col-4">
            <label>Giá gốc</label>
            <input type="number" name="original_price" class="form-control">
            @error('original_price')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3 col-4">
            <label>Giá khuyến mãi</label>
            <input type="number" name="selling_price" class="form-control">
            @error('selling_price')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
        <div class="mb-3 col-4">
            <label>Số lượng</label>
            <input type="number" name="quantity" class="form-control">
            @error('quantity')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
       
        <div class="mb-3 col-4">
            <label>Sản phẩm bán chạy</label><br>
            <input type="checkbox" name="trending">
        </div>
        <div class="mb-3 col-4">
            <label>Trạng thái</label><br>
            <input type="checkbox" name="status"> Chọn=Ẩn, Bỏ chọn=Hiển thị
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 mb-3">
            <hr>
            <h4>SEO Tags</h4>
        </div>
        <div class="mb-12 col-4">
            <label>Meta Title</label>
            <input type="text" name="meta_title" class="form-control">
            @error('meta_title')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-12 col-4">
            <label>Meta Keyword</label>
            <textarea type="text" name="meta_keyword" class="form-control"></textarea>
            @error('meta_keyword')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-12 col-4">
            <label>Meta Description</label>
            <textarea type="text" name="meta_description" class="form-control"></textarea>
            @error('meta_description')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Lưu</button>
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