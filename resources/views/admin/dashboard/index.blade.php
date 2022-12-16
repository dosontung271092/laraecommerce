@extends('layouts.admin')
@section('content')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ __('labels.dashboard') }}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
         <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">{{ __('labels.share') }}</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">{{ __('labels.export') }}</button>
         </div>
         <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
         <span data-feather="calendar" class="align-text-bottom"></span>
         This week
         </button>
      </div>
   </div>
   <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteProductModal').modal('hide');
        });
    </script>
@endpush