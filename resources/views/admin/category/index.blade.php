@extends ('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-3">
                <h3 class="mb-0">All Category</h3>
                <a href="{{ url('admin/category/create')}}" class="btn btn-primary text-white float-end">Add Category</a>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>
@endsection