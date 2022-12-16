@if (session('message'))
    <div class="mt-2 bg bg-success text-white p-2" role="alert">
        {{ session('message') }}  
    </div>
@endif

