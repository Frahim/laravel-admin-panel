@extends ('layouts.admin')

@section('content')
    <div class="row">
        @if (session('message'))
            <div class="col-md-10 alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center py-2">
                    <h3 class="m-0 align-middle">Products</h3>
                    <a href="{{ url('admin/product/create') }}" class="btn btn-primary btn-sm float-end">Add Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Orginal Price</th>
                                    <th scope="col">Selling Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Description</th>  
                                    <th scope="col">Short  Description</th>                                 
                                    <th scope="col">Image</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if($product->brand)
                                            {{ $product->brand->name }}
                                            @else 
                                            No Brand Silected
                                            @endif
                                        </td>
                                        <td>{{ $product->orginal_price }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->other_description }}</td>
                                        <td>
                                            <img src="{{ asset('/uploads/product/' . $product->image) }}" width="60px"
                                                height="60px" />
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/products/' . $product->id . '/edit') }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="#" wire.click="deleteproduct({{ $product->id }})"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="col-12 my-3">
                        {{-- {{ $products->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
