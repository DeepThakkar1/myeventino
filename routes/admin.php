<?php

// Backpack\CRUD: Define the resources for the entities you want to CRUD.
CRUD::resource('venues', 'VenueCrudController');
CRUD::resource('events', 'EventCrudController');
CRUD::resource('vendors', 'VendorCrudController');

Route::auth();

