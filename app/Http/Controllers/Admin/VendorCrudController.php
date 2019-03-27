<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\VendorCrudRequest as StoreRequest;
use App\Http\Requests\VendorCrudRequest as UpdateRequest;

class VendorCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Vendor");
        $this->crud->setRoute("admin/vendors");
        $this->crud->setEntityNameStrings('vendor', 'vendors');

        $this->crud->setColumns(['name', 'address', 'user_email', 'phone']);
        $this->crud->addFields([[
		'name' => 'name', 
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