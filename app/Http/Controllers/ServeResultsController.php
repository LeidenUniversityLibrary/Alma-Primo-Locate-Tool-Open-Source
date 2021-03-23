<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location as Location;
use App\Building as Building;
use App\Alert as Alert;
use App\Option as Option;

class ServeResultsController extends Controller
{
    // NOTE This controller handles the data coming from LocationController and BuildingController and displays it
    public function show($location_id) {
    try {
        //NOTE location is always unique, so we can use "find"
        $location_data = Location::where('location_id', $location_id )->first();
        //NOTE now that we have all the data about the location, we want to extract the building it is in, so we can query the other table.
        $getBuildingID = $location_data->building_id;
        //NOTE now that we have the building id, we are going to use it query the "buildings" table to find it and get all the data about the building!
        $building_data = Building::where('building_id', $getBuildingID)->first();
        //NOTE show alerts, if any
        $alerts = Alert::all();
        //NOTE load options
        $options = Option::find(1);

        //NOTE and now, we pass the location data AND the building data AND the alerts AND the options to the view to display it to the public.
        return view('public.show', ['building_data' => $building_data, 'location_data' => $location_data, 'options' => $options])->with ('data', ['alerts' => $alerts]);

    }

    catch (\Throwable $e) {
        abort(404, 'No information about this location is available. Sorry!');
    }
}


}
