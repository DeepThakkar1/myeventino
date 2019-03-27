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
          'venue_name' => 'required',
          'venue_type' => 'required',
          'best_for'   => 'required',
          'total_area' => 'required',
          'address'    => 'required',
          'city'       => 'required',
          'state'      => 'required',
          'country'    => 'required',
          'pincode'    => 'required',
          'venue_since' => 'required',
          'rooms'      => 'required',
          'contact_name' => 'required',
          'email' => 'required',
          'phone' => 'required',
          'description' => 'required'
        ];
    }

}