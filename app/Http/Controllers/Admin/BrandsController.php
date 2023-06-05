<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandFormRequest;
use Illuminate\Support\Str;
use App\Models\brands;

class BrandsController extends Controller
{
    public function index(){
        return view('admin.brand.index');
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function store( BrandFormRequest $request ){
        $validatedData = $request->validated();
        $brand = new Brands;

        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->description = $validatedData['description'];
        $brand->other_description = $validatedData['other_description'];

        if($request-> hasFile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/brand/', $filename);
            $brand->logo = $filename;
        }

        if($request-> hasFile('Vedio')){
            $file = $request->file('Vedio');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/brand/', $filename);
            $brand->Vedio = $filename;
        }       
   
        $brand->meta_title = $validatedData['meta_title'];
        $brand->meta_keyword = $validatedData['meta_keyword'];
        $brand->meta_description = $validatedData['meta_description'];
        $brand->status =$request->status == true ? '1':'0';
 
        $brand->save();

        return redirect('admin/brand')-> with('message', 'Brand Added');
       
    }

}