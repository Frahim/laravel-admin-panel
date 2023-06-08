<?php

namespace App\Http\Requests;

use Ramsey\Uuid\Type\Integer;
use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'brand_id'=>[
                'required',
                'integer'
           ],
            'name'=>[
                'required',
                'string'
            ],
            'slug'=>[
                'required',
                'string'
            ],
            'description'=>[              
                'string'
            ],    
            'other_description'=>[              
                'string'
            ],
            'orginal_price'=>[  
                'required',            
                'integer'
            ],
            'selling_price'=>[  
                'required',            
                'integer'
            ],
            'quantity'=>[  
                'required',            
                'integer'
            ],

            'meta_title'=>[              
                'string'
            ],
            'meta_keyword'=>[              
                'string'
            ],
            'meta_description'=>[              
                'string'
            ],

            'image'=>[              
                'nullable',
                //'image|mimes:jpeg,png,jpg'
            ],

        ];
    }
}
