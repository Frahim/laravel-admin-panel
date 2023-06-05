@extends ('layouts.admin')

@section('content')
    <div class="row">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Brands</h3>
                    <a href="{{ url('admin/brand/create') }}" class="btn btn-primary btn-sm float-end">Add Brand</a>
                </div>
            </div>
        </div>
    </div>
@endsection
