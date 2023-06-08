@extends ('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-3">
                <h3 class="mb-0">Edit Brand</h3>
                <a href="{{ url('admin/brand/create')}}" class="btn btn-primary text-white float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/brand/'. $brand->id ) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Brand Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$brand->name}}" class="form-control">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>    
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Brand Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="slug"  value="{{$brand->slug}}" class="form-control">
                            @error('slug')
                            <small class="text-danger">{{$message}}</small>    
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Brand Description</label>
                        <div class="col-sm-10">
                            <textarea rows="5" name="description" class="form-control">{{$brand->description}}"</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Other Description</label>
                        <div class="col-sm-10">
                            <textarea rows="5" name="other_description" class="form-control">{{$brand->other_description}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Brand Logo</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" name="logo" class="form-control">
                                <img src="{{ asset('/uploads/brand/'. $brand->logo )}}" width="40px" height="40px" />                                
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Brand Video</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" name="Vedio"  class="form-control">
                                <img src="{{ asset('/uploads/brand/'. $brand->Vedio )}}" width="40px" height="40px" />                               
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">                           
                            <input class="form-check-input" type="checkbox"  name="status" {{$brand->status == '1' ? 'checked':''}}>
                        </div>
                    </div>


                    <div class="row mb-3 mt-5">
                        <div class="col-12 alert alert-danger">
                            <h3>SEO Section</h3>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Meta Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_title" value="{{$brand->meta_title}}" class="form-control">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Meta Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_keyword" value="{{$brand->meta_keyword}}" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Meta Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_description" value="{{$brand->meta_description}}" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-primary text-white float-end">Update</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection