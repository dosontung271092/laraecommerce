@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">{{ __('labels.product-edit') }}</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ url('admin/product') }}" class="btn btn-sm btn-outline-secondary">{{ __('labels.back') }}</a>
   </div>
</div>
<form action="{{ url('admin/product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')
   <div class="tab-content" id="myTabContent">
      <!-- Home -->
      <div class="row">
         <div class="col-6 mb-3">
            <label>Tên</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
         <div class="col-6 mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
            @error('slug')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
         <div class="col-6 mb-3">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
            @endforeach
            </select>
         </div>
         <div class="col-6 mb-3">
            <label>Nhãn hiệu</label>
            <select name="brand_id" class="form-control">
            @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
            </select>
         </div>
         <div class="col-12 mb-3">
            <label>Mô tả ngắn</label>
            <textarea type="text" name="small_description" class="form-control">{{ $product->small_description }}</textarea>
            @error('small_description')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
         <div class="col-12 mb-3">
            <label>Mô tả</label>
            <textarea type="text" name="description" class="form-control" rows="10" id="editor">{{ $product->description }}</textarea>
            @error('description')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
      </div>
      <!-- End Home -->
      <!-- detail -->
      <div class="row">
         <div class="mb-3 col-4">
            <label>Giá gốc</label>
            <input type="number" name="original_price" class="form-control" value="{{ $product->original_price }}">
            @error('original_price')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
         <div class="mb-3 col-4">
            <label>Giá khuyến mãi</label>
            <input type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
            @error('selling_price')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
         <div class="mb-3 col-4">
            <label>Số lượng</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
            @error('quantity')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
         <div class="mb-3 col-4">
            <label>Sản phẩm bán chạy</label><br>
            <input type="checkbox" name="trending" {{ $product->trending == 1 ? 'checked' : '' }}>
         </div>
         <div class="mb-3 col-4">
            <label>Trạng thái</label><br>
            <input type="checkbox" name="status" {{ $product->status == 1 ? 'checked' : '' }}> Chọn=Ẩn, Bỏ chọn=Hiển thị
         </div>
      </div>
      <!-- End detail -->
      <!-- Image tab -->
      <div class="row" id="edit-product__img">
        <div class="col-12">
            <label>Tải ảnh sản phẩm</label>
        </div>
        <div class="col-12 mb-3">
            @if( $product->productImages )
                <div class="row">
                    @foreach( $product->productImages as $key => $image )
                    <div class="mr-1 col-1">
                        <div class="text-center">
                            <a href="{{ url('admin/product-image/'.$image->id) }}" class="text-danger text-decoration-none" title="Remove this image">
                            <h3 class="p-0 m-0" aria-hidden="true">&times;</h3>
                            </a>
                        </div>
                        <div>
                            <img class="img-thumbnail" src="{{ asset($image->image) }}" alt="Product Image {{ $key + 1 }}" >
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <h5>No Image Added</h5>
            @endif
        </div>
         <div class="col-4">
            <input type="file" multiple name="image[]" class="form-control">
            @error('image')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
      </div>
      <!-- End image tab -->
      <!-- Seo -->
      <div class="row">
         <div class="col-md-12 mb-3">
            <hr>
            <h4>SEO Tags</h4>
         </div>
         <div class="col-12 mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
            @error('meta_title')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
         <div class="col-12 mb-3">
            <label>Meta Keyword</label>
            <textarea type="text" name="meta_keyword" class="form-control">{{ $product->meta_keyword }}</textarea>
            @error('meta_keyword')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
         <div class="col-12 mb-3">
            <label>Meta Description</label>
            <textarea type="text" name="meta_description" class="form-control">{{ $product->meta_description }}</textarea>
            @error('meta_description')
            <small class="text-danger">{{$message}}</small>
            @enderror
         </div>
      </div>
      <!-- End Seo -->
   </div>
   <div class="mt-3">
      <button type="submit" class="btn btn-primary">Submit</button>
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