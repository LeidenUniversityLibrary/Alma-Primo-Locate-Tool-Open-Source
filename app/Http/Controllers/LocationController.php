<?php

namespace App\Http\Controllers;

use App\Building as Building;
use App\Location as Location;
use App\Traits\UploadTrait;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    use UploadTrait;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // NOTE Show all Locations
        return view('locations.show')
            ->with('locations', Location::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        // NOTE here we need Alma's APIs: libraries and locations. Be careful not to mix buildings and libraries: a building might contain one or more Alma libraries. An Alma library might contain one or more Alma locations.

        try {
            {
                $almaClient = new GuzzleClient();
                $almaURL = 'https://api-eu.hosted.exlibrisgroup.com/almaws/v1/conf/libraries?apikey=' . env('Alma_API');
                $almaResponse = $almaClient->request('GET', $almaURL, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-type' => 'application/json',
                    ],
                ]);
            }

            return view('locations.start')->with('libraries', json_decode($almaResponse->getBody(), true));

        } catch (\Throwable $exception) {
            abort(503);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // NOTE Accept form submission from the "create location" task form and pass it to the Location table in the Database
        {

            $this->validate($request, [
                'building_id' => 'required|string|max:255',
                'location_id' => 'required|string|unique:locations|max:255',
                'location_name' => 'required|string|unique:locations|max:255',
                'location_name_override' => 'nullable|string|unique:locations|max:255',
                'location_additional_info' => 'nullable|string|max:5000',
                'location_additional_info_link' => 'nullable|url|max:2048',
                'room_name' => 'nullable|string|max:255',
                'location_floor' => 'required|string|max:255',
                'location_map' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'location_description' => 'nullable|string|max:5000',
            ]);

            $location = new Location([
                'building_id' => $request->get('building_id'),
                'location_id' => $request->get('location_id'),
                'location_name' => $request->get('location_name'),
                'location_name_override' => $request->get('location_name_override'),
                'location_additional_info' => $request->get('location_additional_info'),
                'location_additional_info_link' => $request->get('location_additional_info_link'),
                'room_name' => $request->get('room_name'),
                'location_floor' => $request->get('location_floor'),
                'location_map' => $request->get('location_map'),
                'location_description' => $request->get('location_description'),
            ]);

            // Check if an image has been uploaded
            if ($request->has('location_map')) {
                // Get image file
                $image = $request->file('location_map');
                // Make an image name based on user name and current timestamp
                $name = Str::slug($request->input('location_id')) . '_' . time();
                // Define folder path
                $folder = '/uploads/images/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public_html', $name);
                // Set image path in database to filePath
                $location->location_map = $filePath;
            }

            $location->save();

            if ($location->save()) {
                return redirect()->route('show_all_locations')->with("status", "The location has been successfully created.");
            } else {
                return redirect()->route('create_new_location')->with("status", "Something went wrong and the location was not created.");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($location_id)
    {
        // NOTE Show one Location
        $location_data = Location::where('location_id', $location_id)->first();
        $getBuildingID = $location_data->building_id;
        $building_data = Building::where('building_id', $getBuildingID)->first();

        return view('locations.single', ['building_data' => $building_data, 'location_data' => $location_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($location_id)
    {
        $buildings = Building::all(['building_id', 'building_name']);
        // NOTE Edit one Location
        $location_data = Location::where('location_id', $location_id)->first();
        $getBuildingID = $location_data->building_id;
        $building_data = Building::where('building_id', $getBuildingID)->first();

        return view('locations.update', ['building_data' => $building_data, 'location_data' => $location_data])->with('buildings', $buildings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $location_id)
    {
        // NOTE Accept form submission from the "edit Location" task form and pass it to the Location table in the Database
        $request->validate([
            'building_id' => 'required|max:255',
            'location_id' => 'string|unique:locations,location_id,' . $location_id . ',location_id|max:10|required',
            'location_name' => 'string|unique:locations,location_name,' . $location_id . ',location_id|max:255|required',
            'location_name_override' => 'string|nullable|unique:locations,location_name_override,' . $location_id . ',location_id|max:255',
            'location_additional_info' => 'string|nullable|max:5000',
            'location_additional_info_link' => 'url|nullable|max:255',
            'room_name' => 'string|nullable|max:255',
            'location_floor' => 'string|required|max:255',
            'location_map' => 'string|nullable|exclude_if:location_map,1|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location_description' => 'string|nullable|max:5000',
        ]);{
            $location_data = Location::where('location_id', $location_id)->first();
            $location_data->building_id = $request->input('building_id');
            $location_data->location_id = $request->input('location_id');
            $location_data->location_name = $request->input('location_name');
            $location_data->location_additional_info = $request->input('location_additional_info');
            $location_data->location_additional_info_link = $request->input('location_additional_info_link');
            $location_data->location_name_override = $request->input('location_name_override');
            $location_data->room_name = $request->input('room_name');
            $location_data->location_floor = $request->input('location_floor');
            $location_data->location_description = $request->input('location_description');
            // Check if the image should be deleted
            if ($request->get('location_map') == 1) {
                $location_data->location_map = 0;
            }
            // Check if an  image has been uploaded
            elseif ($request->has('location_map')) {
                // Get image file
                $image = $request->file('location_map');
                // Make a image name based on user name and current timestamp
                $name = str_slug($request->input('location_id')) . '_' . time();
                // Define folder path
                $folder = '/uploads/images/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public_html', $name);
                // Set user  image path in database to filePath
                $location_data->location_map = $filePath;
            }

            $location_data->save();

            if ($location_data->save()) {
                return redirect()->route('show_all_locations')->with("status", "The location has been successfully updated.");
            } else {
                return redirect()->route('update_location')->with("status", "Something went wrong and the location was not updated.");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($location_id)
    {
        // NOTE Delete one location
        $location = Location::where('location_id', $location_id)->first();
        $location->delete();
        return redirect()->route('show_all_locations')->with("status", "The location was successfully deleted.");
    }

    public function create($location_id)
    {
        try {
            $buildings = Building::all(['building_id', 'building_name']);{
                $bridgeClient = new GuzzleClient();
                $bridgeURL = 'https://api-eu.hosted.exlibrisgroup.com/almaws/v1/conf/libraries/' . $location_id . '/locations/?apikey=' . (env('Alma_API'));
                $bridgeResponse = $bridgeClient->request('GET', $bridgeURL, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-type' => 'application/json',
                    ],
                ]);
            }

            # when "create" is called, pass the Alma locations decoded API response, the Buildings from the Buildings Table, and the Location from the URL.
            return view('locations.create')
                ->with('locations', json_decode($bridgeResponse->getBody(), true))->with('buildings', $buildings)->with('location_id', $location_id);
        } catch (\Throwable $exception) {
            abort(503);
        }
    }
}
