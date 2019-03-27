<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class VenueCrudRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name'        => 'required',
          'event_type'  => 'required',
          'dates'       => 'required',
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