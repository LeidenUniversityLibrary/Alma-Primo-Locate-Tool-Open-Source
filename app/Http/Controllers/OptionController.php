<?php

namespace App\Http\Controllers;

use App\Option as Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // NOTE We are using 'find(1)' because (1) is the id of the row in the database that contains ALL the options.
        return view('options.options')
            ->with('options', Option::find(1));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        {

            $this->validate($request, [
                'opening_hours_url' => 'nullable',
                'opening_hours_link_is_publicly_visible' => 'bool|required',
            ]);

            $options = Option::find(1);
            $options->opening_hours_url = $request->input('opening_hours_url');
            $options->opening_hours_link_is_publicly_visible = $request->input('opening_hours_link_is_publicly_visible');

            $options->save();

            if ($options->save()) {
                return redirect()->route('admin_options')->with("status", "The option has been successfully updated.");
            } else {
                return redirect()->route('admin_options')->with("status", "Something went wrong and the option was not updated.");
            }
        }
    }
}
