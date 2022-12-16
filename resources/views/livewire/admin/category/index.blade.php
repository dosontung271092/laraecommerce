<div>
    @include('livewire.admin.category.modal')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ __('labels.category') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('admin/category/create') }}" class="btn btn-sm btn-outline-primary">{{ __('labels.add-new') }}</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('labels.category-name') }}</th>
                    <th width="{{ env('TABLE_STATUS_WIDTH') }}">Trạng thái</th> 
                    <th width="{{ env('TABLE_ACTION_WIDTH') }}">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status == '0' ? 'Hiển thị' : 'Ẩn' }}</td>
                    <td>
                        <a href="{{ url('admin/category/'.$category->id) }}" class="btn btn-sm btn-outline-success">Sửa</a>
                        <a href="#" wire:click="deleteCategory({{$category->id}})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    {{ $categories->links() }}
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteCategoryModal').modal('hide');
        });
    </script>
@endpush