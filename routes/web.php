<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/venues', 'VenuesController@index')->name('venues');
Route::get('/venues/filter', 'VenuesController@filter')->name('venues.filter');
Route::post('/venues', 'VenuesController@store')->name('venues.store');
Route::get('/venues/create', 'VenuesController@create')->name('venues.create');
Route::get('/venues/{venue}', 'VenuesController@show')->name('venues.show');
Route::post('/venues/{venue}', 'VenuesController@update')->name('venues.update');
Route::delete('/venues/{venue}', 'VenuesController@destroy')->name('venues.delete');
Route::get('/venues/{venue}/edit', 'VenuesController@edit')->name('venues.edit');

Route::post('/venues/{venue}/photos', 'VenuePhotosController@store')->name('venues.photos.store');
Route::get('/venues/{venue}/sections', 'VenueSectionsController@index')->name('venues.sections');

Route::post('/venues/{venue}/sections', 'VenueSectionsController@store')->name('venues.sections.store');
Route::post('/venues/{venue}/sections/{id}', 'VenueSectionsController@update')->name('venues.sections.update');

Route::post('/venues/{venue}/favourites', 'VenueFavouritesController@store')->name('venues.favourites.store');
Route::delete('/venues/{venue}/favourites', 'VenueFavouritesController@destroy')->name('venues.favourites.update');

Route::post('/venues/{venue}/reviews', 'VenueReviewsController@store')->name('venues.reviews.store');
Route::post('/venues/{venue}/reviews/{id}', 'VenueReviewsController@update')->name('venues.review.update');
Route::delete('/venues/{venue}/reviews/{id}', 'VenueReviewsController@destroy')->name('venues.review.delete');


Route::get('/events', 'EventsController@index')->name('events');
Route::get('/events/filter', 'EventsController@filter')->name('events.filter');
Route::post('/events', 'EventsController@store')->name('events.store');
Route::get('/events/create', 'EventsController@create')->name('events.create');
Route::get('/events/{event}', 'EventsController@show')->name('events.show');
Route::post('/events/{event}', 'EventsController@update')->name('events.update');
Route::post('/events/{event}/timings', 'EventsController@timings')->name('events.timings.update');
Route::post('/events/{event}/dates', 'EventsController@dates')->name('events.dates.update');
Route::post('/events/{event}/packages', 'EventsController@packages')->name('events.packages.update');
Route::delete('/events/{event}/packages/{index}', 'EventsController@deletePackage')->name('events.packages.delete');
Route::patch('/events/{event}/packages/{index}', 'EventsController@updatePackage')->name('events.packages.update');
Route::post('/events/{event}/policies', 'EventsController@policies')->name('events.policies.update');
Route::delete('/events/{event}/policies/{index}', 'EventsController@deletePolicy')->name('events.policies.delete');
Route::patch('/events/{event}/policies/{index}', 'EventsController@updatePolicy')->name('events.policies.update');
Route::delete('/events/{event}', 'EventsController@destroy')->name('events.delete');
Route::get('/events/{event}/manage', 'EventsController@manage')->name('events.manage');

Route::post('/events/{event}/photos', 'EventPhotosController@store')->name('events.photos.store');

Route::post('/events/{event}/favourites', 'EventFavouritesController@store')->name('events.favourites.store');
Route::delete('/events/{event}/favourites', 'EventFavouritesController@destroy')->name('events.favourites.update');

Route::post('/events/{event}/reviews', 'EventReviewsController@store')->name('events.reviews.store');
Route::post('/events/{event}/reviews/{id}', 'EventReviewsController@update')->name('events.review.update');
Route::delete('/events/{event}/reviews/{id}', 'EventReviewsController@destroy')->name('events.review.delete');

Route::get('/vendors', 'VendorsController@index')->name('vendors');
Route::get('/vendors/filter', 'VendorsController@filter')->name('vendors.filter');
Route::get('/vendors/create', 'VendorsController@create')->name('vendors.create');
Route::post('/vendors', 'VendorsController@store')->name('vendors.store');
Route::get('/vendors/{vendor}', 'VendorsController@show')->name('vendors.show');
Route::post('/vendors/{vendor}', 'VendorsController@update')->name('vendors.update');
Route::get('/vendors/{vendor}/manage', 'VendorsController@manage')->name('vendors.manage');
Route::post('/vendors/{vendor}/policies', 'VendorsController@policies')->name('vendors.policies.update');
Route::delete('/vendors/{vendor}/policies/{index}', 'VendorsController@deletePolicy')->name('vendors.policies.delete');
Route::patch('/vendors/{vendor}/policies/{index}', 'VendorsController@updatePolicy')->name('vendors.policies.update');

Route::post('/vendors/{vendor}/packages', 'VendorPackagesController@store')->name('vendors.packages.update');
Route::delete('/vendors/{vendor}/packages/{package}', 'VendorPackagesController@destroy')->name('vendors.packages.delete');
Route::patch('/vendors/{vendor}/packages/{package}', 'VendorPackagesController@update')->name('vendors.packages.update');

Route::post('/vendors/{vendor}/photos', 'VendorPhotosController@store')->name('vendors.photos.store');

Route::post('/vendors/{vendor}/favourites', 'VendorFavouritesController@store')->name('vendors.favourites.store');
Route::delete('/vendors/{vendor}/favourites', 'VendorFavouritesController@destroy')->name('vendors.favourites.update');

Route::post('/vendors/{vendor}/reviews', 'VendorReviewsController@store')->name('vendors.reviews.store');
Route::post('/vendors/{vendor}/reviews/{id}', 'VendorReviewsController@update')->name('vendors.review.update');
Route::delete('/vendors/{vendor}/reviews/{id}', 'VendorReviewsController@destroy')->name('vendors.review.delete');

Route::get('/user/account', 'ProfileController@index')->name('profile.index');
Route::post('/user/account', 'ProfileController@update')->name('profile.update');
Route::get('/user/favourites', 'ProfileController@favourites')->name('profile.favourites');
Route::get('/user/venues', 'ProfileController@venues')->name('profile.venues');
Route::get('/user/events', 'ProfileController@events')->name('profile.events');
Route::get('/user/vendors', 'ProfileController@vendors')->name('profile.vendors');
Route::get('/user/password', 'ProfileController@password')->name('profile.password');
Route::post('/user/password', 'ProfileController@updatePassword')->name('profile.password.update');
Route::get('/user/orders', 'ProfileController@orders')->name('profile.orders');

Route::get('/user/events/going', 'ProfileController@going')->name('profile.going');


Route::post('/user/goingto/{event}', 'ProfileController@addEvent')->name('profile.events.add');
Route::delete('/user/goingto/{event}', 'ProfileController@removeEvent')->name('profile.events.remove');


Route::get('findVenues', 'SearchController@findVenues');


Route::post('/events/{event}/package/{index}/buy', 'EventPaymentsController@buyPackage');
Route::get('/payments/response/order:{oid}', 'EventPaymentsController@response');

Route::get('/invoice/download/{oid}', 'EventPaymentsController@download')->name('payments.orders.download');






