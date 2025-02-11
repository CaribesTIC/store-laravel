<?php

namespace Modules\Product\Http\Requests\Presentation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePresentationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //auth()->user()->role->name === "admin";
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): Array
    {
        return [        
           "product_id" => ["required"],
            //"sale_type" => ["required"],
            //"int_cod" => ["required"],     
            "bar_cod" => ["nullable"],
            "packing_deployed" => ["required"],
            "packing_json" => ["required"],
            // "packing_deployed" => ["required"],     --->    it is not necessary to send
            //"stock_min" => ["required"],
            //"stock_max" => ["required"],
            "price" => ["nullable"],
            "status" => ["required"]            
        ];
        return true;
    }
}
