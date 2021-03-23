<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alert as Alert;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // NOTE Show all alerts
        $alerts = Alert::all();

        return view('alerts/admin_alerts')->with('data', [
            'alerts' => $alerts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newAlert = new Alert;
        $newAlert->title = $request->input('title');
        $newAlert->custom_alert = $request->input('custom_alert');
        $newAlert->url = $request->input('url');
        $newAlert->url_text = $request->input('url_text');
        $newAlert->is_publicly_visible = $request->input('is_publicly_visible');

        $request->validate([
            'title' => 'required|min:3|max:255|string',
            'custom_alert' => 'max:5000|required|string',
            'is_publicly_visible' => 'bool|required',
            'url' => 'url|max:255|nullable',
            'url_text' => 'max:255|nullable|string'
            ]
        );

        $newAlert->save();

        if ($newAlert->save()) {
            return redirect()->route('admin_alerts')->with("status", "The alert was saved");
        } else {
            return redirect()->route('admin_alerts')->with("status", "Unable to create save the alert");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alert_data = Alert::where('id', $id)->first();
        return view('alerts.single', $alert_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // NOTE Edit one alert
        $alert_data = Alert::where('id', $id)->first();
        //dd($alert_data);
        return view('alerts/update_alert')
            ->with('alert_data', $alert_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // NOTE Accept form submission from the "edit Building" task form and pass it to the Building table in the Database
        $request->validate([
            'title' => 'required|min:3|max:255m',
            'custom_alert' => 'max:5000',
            'is_publicly_visible' => 'bool|required',
            'url' => 'max:2083',
            'url_text' => 'max:5000'

        ]);

        {
            $alert = Alert::where('id', $id)->first();
            $alert->title = $request->input('title');
            $alert->custom_alert = $request->input('custom_alert');
            $alert->url = $request->input('url');
            $alert->url_text = $request->input('url_text');
            $alert->is_publicly_visible = $request->input('is_publicly_visible');

            //dd($alert);

            $alert->save();

            if ($alert->save()) {
                return redirect()->route('admin_alerts')->with("status", "The alert has been successfully updated.");
            } else {
                return redirect()->route('edit_alert')->with("status", "Something went wrong and the alert was not updated.");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // NOTE Delete one monitor
        $monitor = Alert::where('id', $id)->first();
        if ($monitor->delete()){
            return redirect()->route('admin_alerts')->with("status", "The alert was successfully deleted");
        } else {
            return redirect()->route('admin_alerts')->with("status", "Unable to delete alert");
        }
    }
}
