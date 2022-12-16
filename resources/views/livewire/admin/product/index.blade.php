<div>
    @include('livewire.admin.product.modal')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ __('labels.product') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('admin/product/create') }}" class="btn btn-sm btn-outline-primary">{{ __('labels.add-new') }}</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Danh mục</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th width="{{ env('TABLE_STATUS_WIDTH') }}">Trạng thái</th> 
                    <th width="{{ env('TABLE_ACTION_WIDTH') }}">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category ? $product->category->name : 'No Category' }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->original_price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->status == '0' ? 'Hiển thị' : 'Ẩn' }}</td>
                    <td>
                        <a href="{{ url('admin/product/'.$product->id) }}" class="btn btn-sm btn-outline-success">Sửa</a>
                        <a href="{{ url('admin/product/'.$product->id.'/delete') }}" 
                            onclick="return confirm('Bạn có muốn xóa dữ liệu này không?')" 
                            class="btn btn-sm btn-outline-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteProductModal').modal('hide');
        });
    </script>
@endpush