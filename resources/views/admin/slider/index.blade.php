@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('labels.slider') }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ url('admin/slider/create') }}" class="btn btn-sm btn-outline-primary">{{ __('labels.add-new') }}</a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th width="{{ env('TABLE_STATUS_WIDTH') }}">Trạng thái</th> 
                <th width="{{ env('TABLE_ACTION_WIDTH') }}">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td><img src="{{ asset($slider->image) }}" class="img-thumbnail" width="{{ env('IMG_INDEX_WIDTH') }}"></td>
                <td>{!! $slider->title !!}</td>
                <td>{{ $slider->description }}</td>
                <td>{{ $slider->status == '0' ? 'Hiển thị' : 'Ẩn' }}</td>
                <td>
                    <a href="{{ url('admin/slider/'.$slider->id) }}" class="btn btn-sm btn-outline-success">Sửa</a>
                    <a href="{{ url('admin/slider/'.$slider->id.'/delete') }}" 
                       onclick="return confirm('Bạn có muốn xóa dữ liệu này không?')" 
                       class="btn btn-sm btn-outline-danger">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
</div>

    
@endsection
