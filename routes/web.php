<?php

use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| SECTION Admin routes (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group( function(){

    /*
    |--------------------------------------------------------------------------
    | SECTION Buildings
    |--------------------------------------------------------------------------
    */

    /* SECTION Here we will create, read, update, and delete the buildings */
    Route::get('/buildings', 'BuildingController@index')->name('show_all_buildings');
    Route::get('/building/{building_id}','BuildingController@show')->name('show_building');
    Route::get('/update/building/{building_id}', 'BuildingController@edit')->name('update_building');
    Route::post('/update/building/{building_id}', 'BuildingController@update')->name('save_update_building');
    Route::delete('/update/building/{building_id}', 'BuildingController@destroy')->name('delete_building');
    Route::get('/create/building', 'BuildingController@create')->name('create_new_building');
    Route::post('/create/building', 'BuildingController@store');

    /*
    |--------------------------------------------------------------------------
    | SECTION Libraries & Locations
    |--------------------------------------------------------------------------
    */

    Route::get('/create/location', 'LocationController@start')->name('create_new_location');
    Route::get('/create/location/{location_id}', 'LocationController@create')->name('bridge_create_new_location');
    Route::post('/create/location/{location_id}', 'LocationController@store');
    Route::get('/locations', 'LocationController@index')->name('show_all_locations');
    Route::get('/location/{location_id}','LocationController@show')->name('show_location');
    Route::get('/update/location/{location_id}', 'LocationController@edit')->name('update_location');
    Route::post('/update/location/{location_id}', 'LocationController@update')->name('save_update_location');
    Route::delete('/update/location/{location_id}', 'LocationController@destroy')->name('delete_location');

        /*
    |--------------------------------------------------------------------------
    | SECTION Alerts
    |--------------------------------------------------------------------------
    */
    Route::get('/alerts', 'AlertController@index')->name('admin_alerts');
    Route::post('/alerts', 'AlertController@store');
    Route::get('/alert/{id}', 'AlertController@edit')->name('edit_alert');
    Route::post('/alert/{id}', 'AlertController@update')->name('update_alert');
    Route::delete('/alert/{id}', 'AlertController@destroy')->name('delete_alert');

    /*
    |--------------------------------------------------------------------------
    | SECTION Options
    |--------------------------------------------------------------------------
    */

    Route::get('/options', 'OptionController@edit')->name('admin_options');
    Route::post('/options', 'OptionController@update')->name('update_options');

    });

/*
|--------------------------------------------------------------------------
| SECTION Output (PUBLIC)
|--------------------------------------------------------------------------
*/

    /* SECTION Where the magic happens: based on the building_id and the location_id Code coming from Primo, display related information */
    Route::get('find/{location_id}', 'ServeResultsController@show')->name('show_results');

    /*
    |--------------------------------------------------------------------------
    | SECTION Generic welcome / home page / other pages
    |--------------------------------------------------------------------------
    */

    /* SECTION Welcome page where we explain what the app does, where to get it, etc.*/
    Route::get('/', function () {
        return view('public.welcome');
    });

    Route::get('/credits', function () {
        return view('public.credits');
    });

    /*
    |--------------------------------------------------------------------------
    | SECTION Admin & Admin / User Generation
    |--------------------------------------------------------------------------
    */

    /* SECTION Admin login */
    Auth::routes(['register' => false, 'reset'=> false, 'verify'=>false]);
    Route::get('/home', 'HomeController@index');

    /*
    |--------------------------------------------------------------------------
    | Alma-Primo Locate Tool comes with a standard "admin@example.com" & "password" to help you try out the tool locally.
    | It's imperative that you change you admin username and password before you send to production or anywhere on the web.
    |--------------------------------------------------------------------------
    */

    // Route::get('/generate/password', function() { return bcrypt('password');});
