<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
       return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brands::all();
        return view('admin.products.create', compact('brands'));
    }

    public function store(ProductFormRequest $request)
    {
       
       $validatedData = $request->validated();
       
       $brand = Brands::findOrFail($validatedData['brand_id']);      
        $product = $brand->products()->create([
            'brand_id' => $validatedData['brand_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'description'=> $validatedData['description'],
            'other_description'=> $validatedData['other_description'],  
            'orginal_price'=> $validatedData['orginal_price'],
            'selling_price'=> $validatedData['selling_price'],
            'quantity'=> $validatedData['quantity'],      
            'meta_title'=> $validatedData['meta_title'],
            'meta_keyword'=> $validatedData['meta_keyword'],
            'meta_description'=> $validatedData['meta_description'],
       ]);

       if($request->hasFile('image')){
        $uploadPath = 'uploads/products/';

        $i =1;
        foreach($request->file('image') as $imageFile){
            $extention = $imageFile-> getClientOriginalExtension();
            $filename = time().$i++.'.'.$extention;
            $imageFile-> move($uploadPath, $filename);
            $finalImagePathName = $uploadPath.$filename;

            $product->productImages()->create([
                'product_id' => $product->id,
                'image' => $finalImagePathName,
            ]);
        }
       }

       return Redirect('admin/products')->with('message','Product Added Sucessfilly');
    }

    public function edit(int $product_id)
    {
        $brands = Brands::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('brands','product'));
    }
}
