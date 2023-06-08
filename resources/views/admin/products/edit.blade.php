@extends ('layouts.admin')

use

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Edit Products</h3>
                    <a href="{{ url('admin/products') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products'. $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active h4 py-3" id="product-info" data-bs-toggle="tab"
                                    data-bs-target="#product-info" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Product Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link h4 py-3" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo"
                                    type="button" role="tab" aria-controls="seo" aria-selected="false">SEO</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link h4 py-3" id="product_iamge_tab" data-bs-toggle="tab"
                                    data-bs-target="#product_iamge" type="button" role="tab"
                                    aria-controls="product_iamge" aria-selected="false"> Product Images</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="product-info" role="tabpanel"
                                aria-labelledby="product-info">
                                <div class="my-3">
                                    <label class="me-3">Brand</label>
                                    <select name="brand_id" class="form-conrol p-2">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected':''}}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="my-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control" />
                                </div>



                                <div class="my-3">
                                    <label> Product Description</label>
                                    <input type="text" name="description" value="{{ $product->description }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Short Description</label>
                                    <input type="text" name="other_description" value="{{ $product->other_description }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Regular Price</label>
                                    <input type="text" name="orginal_price" value="{{ $product->orginal_price }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Selling Price</label>
                                    <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Quantity</label>
                                    <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" />
                                </div>




                            </div>
                            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                <div class="my-3">
                                    <label> Product Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Meta Keyword</label>
                                    <input type="text" name="meta_keyword" value="{{ $product->meta_keyword }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Meta Description</label>
                                    <input type="text" name="meta_description" value="{{ $product->meta_description }}" class="form-control" />
                                </div>
                            </div>

                            <div class="tab-pane fade" id="product_iamge" role="tabpanel" aria-labelledby="iamge-tab">
                                <div class="my-3">
                                    <label class="col-sm-2 col-form-label">Product Image</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="file" multiple name="image[]" class="form-control">
                                        </div>
                                        <div class="my-3">
                                            @if ($product->productImages)
                                                @foreach ($product->productImages as $image)
                                                <img src="{{ asset($image->image ) }}" alt="Product Iamge" style="width: 200px; height:200px; object-fit:cover"/>
                                                @endforeach
                                            @else
                                            No image
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
