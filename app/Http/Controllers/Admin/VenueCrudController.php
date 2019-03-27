<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\VenueCrudRequest as StoreRequest;
use App\Http\Requests\VenueCrudRequest as UpdateRequest;

class VenueCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Venue");
        $this->crud->setRoute("admin/venues");
        $this->crud->setEntityNameStrings('venue', 'venues');

        $this->crud->setColumns(['venue_name', 'address', 'user_email', 'phone']);
        $this->crud->addFields([[
		'name' => 'venue_name', 
		],[
		'name' => 'address', 
		],[
		'name' => 'phone', 
		]]
		);
		 
    }

	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}