<div>
    @include('livewire.admin.taxonomy.modal')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ __('labels.taxonomy') }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('admin/taxonomy/create') }}" class="btn btn-sm btn-outline-primary">{{ __('labels.add-new') }}</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('labels.taxonomy-name') }}</th>
                    <th width="{{ env('TABLE_STATUS_WIDTH') }}">Trạng thái</th> 
                    <th width="{{ env('TABLE_ACTION_WIDTH') }}">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($taxonomies as $taxonomy)
                <tr>
                    <td>{{ $taxonomy->id }}</td>
                    <td>{{ $taxonomy->name }}</td>
                    <td>{{ $taxonomy->status == '0' ? 'Hiển thị' : 'Ẩn' }}</td>
                    <td>
                        <a href="{{ url('admin/taxonomy/'.$taxonomy->id) }}" class="btn btn-sm btn-outline-success">Sửa</a>
                        <a href="#" wire:click="deleteTaxonomy({{$taxonomy->id}})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteTaxonomyModal">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    {{ $taxonomies->links() }}
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteTaxonomyModal').modal('hide');
        });
    </script>
@endpush