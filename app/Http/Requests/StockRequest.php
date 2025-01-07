<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StockRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "amount" => "required|numeric",
            "store_id" => "required|numeric",
            "book_id" => "required|numeric"
        ];
    }

    public function failedValidation(Validator $validator){

        throw new HttpResponseException(ApiResponse::fail("Validation Error", $validator->errors(), 422));

    }

}
