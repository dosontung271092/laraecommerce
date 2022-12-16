@extends('layouts.admin')
@section('content')

<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Color 
                        <a href="{{ url('admin/color/create') }}" class="btn btn-primary btn-sm float-right">Add color</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($colors as $color)
                            <tr>
                                <td>{{ $color->id }}</td>
                                <td>{{ $color->name }}</td>
                                <td>{{ $color->code }}</td>
                                <td>{{ $color->status == '0' ? 'Visible' : 'Hidden' }}</td>
                                <td>
                                    <a href="{{ url('admin/color/'.$color->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/color/'.$color->id.'/delete') }}" 
                                       onclick="return confirm('Are you sure, you want to delete this data?')" 
                                       class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    
</div>
 
@endsection
