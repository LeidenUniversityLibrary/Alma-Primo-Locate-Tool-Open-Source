@extends('layouts.app')
@section('css')
@endsection

@section('content')
<!-- SECTION content -->

@isset($locations['location'] )
    <h2>Step 2: Select and describe a location</h2>
    <hr>
    <form
        action="{{ route ('bridge_create_new_location', ['location_id' => $location_id]) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h4>Alma Location</h4>
        <div class="form-group">
            <small class="text-muted">Choose the Alma location. This list is generated by
                Alma based on the library you selected in step 1</small>
            <select class="form-control" id="location_name" name="location_name" title="location_name" required>
                <option selected="selected" value="">------</option>
                @foreach($locations['location'] as $location)
                    <option data-addvalue="{{ $location['code'] }}"
                        value="{{ $location['name'] }}">
                        {{ $location['name'] }}
                @endforeach
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="location_id">Alma Location ID</label>
            <input readonly required name="location_id" type="text" class="form-control" id="location_id"
                placeholder="-----"
                value="{{ old('location_id') ? old('location_id') : "" }}">
        </div>

        <div class="form-group">
            <label for="location_name_override">Override Alma Location name (optional)</label>
            <small class="text-muted">Override the name of an Alma Location by typing it here. Leave empty to display
                the original name.</small>
            <input name="location_name_override" type="text" class="form-control" id="location_name_override"
                value="{{ old('location_name_override') ? old('location_name_override') : "" }}">
        </div>

        <hr>
        <h4>Location information</h4>

        <div class="form-group">
            <label for="building_id">Building</label>
            <small class="text-muted">Select the building where your location can be found</small>
            <select class="form-control" id="building_id" name="building_id" title="building_id" required>
                <option selected="selected" value="">------</option>
                @foreach($buildings as $building)
                    <option value="{{ $building['building_id'] }}">
                        {{ $building['building_name'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="location_floor">Floor</label>
            <small class="text-muted">Select the floor where your location can be found</small>
            <select name="location_floor" class="form-control" id="location_floor" required>
                <option selected value="">-----</option>
                <option value="no_floor">Do not display floor</option>
                <option value="-2">-2</option>
                <option value="-1">-1</option>
                <option value="0 - Ground floor">0 - Ground floor</option>
                <option value="1 - First floor">1 - First floor</option>
                <option value="2 - Second floor">2 - Second floor</option>
                <option value="3 - Third floor">3 - Third floor</option>
                <option value="4 - Fourth floor">4 - Fourth floor</option>
                <option value="5 - Fifth floor">5 - Fifth floor</option>
            </select>
        </div>

        <div class="form-group">
            <label for="room_name">Room name</label>
            <small class="text-muted">Enter the name of the room where the item is located, if any</small>
            <input name="room_name" type="text" class="form-control" id="room_name"
                value="{{ old('room_name') ? old('room_name') : "" }}">
        </div>

        <div class="form-group">
            <label for="location_description">Additional information (optional)</label>
            <small class="text-muted">Enter any useful information that will help the patron find this location</small>
            <textarea name="location_description" type="text" class="form-control" id="location_description" rows="3"
                value="{{ old('location_description') ? old('location_description') : "" }}"></textarea>
        </div>

        <div class="form-group">
            <label for="location_additional_info_link">Additional link (optional)</label>
            <small class="text-muted">Enter a useful URL about this location</small>
            <input name="location_additional_info_link" type="text" class="form-control"
                id="location_additional_info_link"
                value="{{ old('location_additional_info_link') ? old('location_additional_info_link') : "" }}">
        </div>

        <div class="form-group">
            <label for="location_additional_info">Additional link text (optional)</label>
            <small class="text-muted">Enter a text for your URL. This will become clickable.</small>
            <input name="location_additional_info" type="text" class="form-control" id="location_additional_info"
                value="{{ old('location_additional_info') ? old('location_additional_info') : "" }}">
        </div>

        <div class="form-group">
            <label for="location_map">Location map (optional)</label>
            <small class="text-muted">Upload a map highlighting where the collection is. Max 2MB</small>
            <input type="file" name="location_map" class="form-control-file" id="location_map">
        </div>
        <hr>

        <button class="btn btn-success" type="submit" id="add_location">Add Location <i class="fas fa-plus"></i></button>
        <a class="btn btn-danger pull-right" href="{{ route('create_new_location') }}">Cancel <i class="fas fa-ban"></i></a>
    </form>
@endisset

@empty($locations['location'])
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">No Alma Locations in this Alma Library!</h4>
    <p>The Alma Library you have selected contains no Alma Locations.</p>
    <hr>
    <p class="mb-0">You cannot create an Alma Location here. To create an Alma Location, contact your Alma
        administrator. Once an Alma Location has been created for this Alma Library, you will be able to continue the
        process process.</p>
</div>

<a class="btn btn-danger pull-right" href="{{ route('create_new_location') }}">Cancel <i class="fas fa-ban"></i></a>
@endempty

@endsection

@section('javascript')
<script type="text/javascript">
    /* NOTE this code passes the code of the selected library to id="library_id" input */
    /* FIXME This is a front-end gimmick - other code could be entered by editing the html directly and cause problems in the database */

    $('#location_name').on('change', function () {
        console.log(this)
        var code = $(this).find('option:selected').data("addvalue");
        $('#location_id').val(code).attr("value", code);
    });

</script>
@endsection
