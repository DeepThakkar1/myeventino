<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\EventCrudRequest as StoreRequest;
use App\Http\Requests\EventCrudRequest as UpdateRequest;

class EventCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Event");
        $this->crud->setRoute("admin/events");
        $this->crud->setEntityNameStrings('event', 'events');

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