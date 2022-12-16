<div>
    @include('livewire.admin.brand.modal')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ __('labels.brand') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addBrandModal" >{{ __('labels.add-new') }}</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên nhãn hiệu</th>
                    <th>Slug</th>
                    <th width="{{ env('TABLE_STATUS_WIDTH') }}">Trạng thái</th> 
                    <th width="{{ env('TABLE_ACTION_WIDTH') }}">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->slug }}</td>
                    <td>{{ $brand->status == '0' ? 'Hiển thị' : 'Ẩn' }}</td>
                    <td>
                        <a href="#" wire:click="editBrand({{$brand->id}})" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#updateBrandModal">Sửa</a>
                        <a href="#" wire:click="deleteBrand({{$brand->id}})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteBrandModal">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Pagination -->
        {{ $brands->links() }}
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        });
    </script>
@endpush