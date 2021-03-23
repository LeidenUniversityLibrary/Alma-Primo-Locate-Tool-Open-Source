<?php

namespace App\Http\Controllers;

use App\Location as Location;
use App\Building as Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{

    public function __construct(Building $building)
    {
        $this->building = $building;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // NOTE Show all Buildings
        return view('buildings.show')
            ->with('buildings', Building::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // NOTE Show the create Building form
        return view('buildings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // NOTE Accept form submission from the "create building" task form and pass it to the Building table in the Database
        {

            $this->validate($request, [
                'building_name' => 'required|string|unique:buildings|max:255',
                'building_id' => 'required|string|unique:buildings|min:4|max:5',
                'building_country' => 'required|string|max:255',
                'building_city' => 'required|string|max:255',
                'building_zip' => 'required|string|max:255',
                'building_street' => 'required|string|max:255',
                'building_number' => 'required|string|max:255',
                'embed_google_map' => 'max:5000|starts_with:<iframe src="https://www.google.com/maps/embed?|ends_with:</iframe>|nullable',
                'building_description' => 'string|required|max:5000',
                'opening_hours_url' => 'max:255|url|nullable',
                'building_add_url' => 'max:255|url|nullable',
                'building_add_text' => 'max:255|string|nullable'
            ]);

            $building = new Building([
                'building_name' => $request->get('building_name'),
                'building_id' => $request->get('building_id'),
                'building_country' => $request->get('building_country'),
                'building_city' => $request->get('building_city'),
                'building_zip' => $request->get('building_zip'),
                'building_street' => $request->get('building_street'),
                'building_number' => $request->get('building_number'),
                'embed_google_map' => $request->get('embed_google_map'),
                'building_description' => $request->get('building_description'),
                'opening_hours_url' => $request->get('opening_hours_url'),
                'building_add_url' => $request->get('building_add_url'),
                'building_add_text' => $request->get('building_add_text'),
            ]);

            $building->save();

            if ($building->save()) {
                return redirect()->route('show_all_buildings')->with("status", "The building has been successfully created.");
            } else {
                return redirect()->route('create_new_building')->with("status", "Something went wrong and the building was not created.");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($building_id)
    {
        // NOTE Show one Building. Also, we want to know which locations are linked to that building.

        $building_data = Building::where('building_id', $building_id)->first();
        $getBuildingID = $building_data->building_id;
        $linked_locations = Location::where('building_id', $getBuildingID)->get();

        return view('buildings.single', $building_data)->with ('data', ['linked_locations' => $linked_locations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($building_id)
    {
        // NOTE Edit one Building
        $building_data = Building::where('building_id', $building_id)->first();
        //dd($building_data);
        return view('buildings.update')
            ->with('building_data', $building_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building, $building_id)
    {
        // NOTE Accept form submission from the "edit Building" task form and pass it to the Building table in the Database
        $request->validate([
            'building_name' => 'unique:buildings,building_name,'. $building_id .',building_id|max:255|required',
            'building_id' => 'unique:buildings,building_id,'. $building_id .',building_id|max:5|min:4|required',
            'building_country' => 'required|string|max:255',
            'building_city' => 'required|string|max:255',
            'building_zip' => 'required|string|max:255',
            'building_street' => 'required|string|max:255',
            'building_number' => 'required|string|max:255',
            'embed_google_map' => 'max:5000|starts_with:<iframe src="https://www.google.com/maps/embed?|ends_with:</iframe>|nullable',
            'building_description' => 'max:5000|string|nullable',
            'opening_hours_url' => 'max:255|url|nullable',
            'building_add_url' => 'max:255|url|nullable',
            'building_add_text' => 'max:255|string|nullable'
        ]);

        {
            $building_data = Building::where('building_id', $building_id)->first();
            $building_data->building_name = $request->input('building_name');
            $building_data->building_country = $request->input('building_country');
            $building_data->building_city = $request->input('building_city');
            $building_data->building_zip = $request->input('building_zip');
            $building_data->building_street = $request->input('building_street');
            $building_data->building_number = $request->input('building_number');
            $building_data->embed_google_map = $request->input('embed_google_map');
            $building_data->building_description = $request->input('building_description');
            $building_data->opening_hours_url = $request->input('opening_hours_url');
            $building_data->building_add_url = $request->input('building_add_url');
            $building_data->building_add_text = $request->input('building_add_text');

            $building_data->save();

            if ($building_data->save()) {
                return redirect()->route('show_all_buildings')->with("status", "The building has been successfully updated.");
            } else {
                return redirect()->route('update_building')->with("status", "Something went wrong and the building was not updated.");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($building_id)
    {
        // NOTE Delete one building
        //TODO Prevent delition of building if building_id is used in a location.
        //Get all the building_ids in the locaitons
        $existing_location =  Location::where('building_id', $building_id)->first();
        // if the locations are not using the building_id, then delete the building...
        if ($existing_location === null) {
            $building = Building::where('building_id', $building_id)->first();
            $building->delete();
            return redirect()->route('show_all_buildings')->with("status", "The building was successfully deleted.");
        }
        // otherwise, stop and inform the user
        else {
            return redirect()->route('show_all_buildings')->with("status", "You cannot delete a building that is used by locations.");
        }

    }
}
