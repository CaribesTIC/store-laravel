<?php

namespace Modules\Article\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "int_cod" => ["required"],  
            "name" => ["required"],  
            "price" => ["required"],  
            "stock_min" => ["required"],  
            "stock_max" => ["required"],  
            "status" => ["required"],  
            "photo" => ["required"],  
            //"id_user_insert" => ["required"],  
            //"id_user_update" => ["required"] 
            
        ];
    }
}
