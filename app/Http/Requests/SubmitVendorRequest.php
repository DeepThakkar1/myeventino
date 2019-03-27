<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitVendorRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'name'                => 'required',
          'vendor_types'        => 'required',
          'establishment_date'  => 'required',
          'address'     => 'required',
          'city'        => 'required',
          'state'       => 'required',
          'country'     => 'required',
          'pincode'     => 'required',
          'description' => 'required',
          'contact_name' => 'required',
          'email' => 'required',
          'phone' => 'required',
          'website' => 'required',
        ];
    }
}
