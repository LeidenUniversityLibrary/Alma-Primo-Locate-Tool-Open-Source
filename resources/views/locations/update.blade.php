@extends('layouts.app')
@section('css')
@endsection

@section('content')
<!-- SECTION content -->
<h4>Update location</h4>
<form action={{route('update_location', [ 'location_id' => $location_data->location_id ])}} method="post"
    enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="form-group">
        <label for="location_name">Alma Location</label>
        <input readonly name="location_name" type="text" class="form-control" id="location_name"
            value="{{ $location_data->location_name }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>
    <div class="form-group">
        <label for="location_id">Alma Location ID</label>
        <input readonly name="location_id" type="text" class="form-control" id="location_id"
            value="{{ $location_data->location_id }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>

    <div class="form-group">
        <label for="location_name_override">Override Alma Location name (optional)</label>
        <small class="text-muted">Override the name of an Alma Location by typing it here. Leave empty to display the original name.</small>
        <input name="location_name_override" type="text" class="form-control" id="location_name_override"
            value="{{ $location_data->location_name_override }}">
    </div>

    <hr>
        <div class="form-group">
            <label for="building_id">Building</label>
            <small class="text-muted">Update the building where the location can be found</small>
            <select class="form-control" id="building_id" name="building_id" title="building_id" required>
                <option selected="selected" value="{{ $building_data->building_id }}">
                    {{ $building_data->building_name }}</option>
                @foreach($buildings as $building)
                <option value="{{ $building['building_id'] }}"> {{ $building['building_name'] }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="location_floor">Floor</label>
            <small class="text-muted">Update the floor where the location can be found</small>
            <select name="location_floor" class="form-control" id="location_floor" required>
                <option selected value="{{ $location_data->location_floor }}">Currently active: {{ $location_data->location_floor }}
                </option>
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
            <small class="text-muted">Update the room where the location can be found</small>
            <input name="room_name" type="text" class="form-control" id="room_name"
                value="{{ $location_data->room_name }}">
            <div class="invalid-feedback">
                Please fill in this field.
            </div>
        </div>
<hr>
        <div class="form-group">
            <label for="location_description">Additional information (optional)</label>
            <textarea name="location_description" type="text" class="form-control" id="location_description"
                value="{{ $location_data->location_description }}" rows="3">{{ $location_data->location_description }}</textarea>
            <div class="invalid-feedback">
                Please fill in this field.
            </div>
        </div>

        <div class="form-group">
            <label for="location_additional_info_link">Additional link (optional)</label>
            <small class="text-muted">Enter a useful URL about this location</small>
            <input name="location_additional_info_link" type="text" class="form-control" id="location_additional_info_link"
                value="{{ $location_data->location_additional_info_link}}">
        </div>

        <div class="form-group">
            <label for="location_additional_info">Additional link text (optional)</label>
            <small class="text-muted">Enter a text for your URL. This will become clickable.</small>
            <input name="location_additional_info" type="text" class="form-control" id="location_additional_info"
                value="{{ $location_data->location_additional_info}}">
        </div>

        <div class="form-group">
            <label for="location_map">Location map (optional)</label>
            <small class="text-muted">Upload a map highlighting where the collection is. Max 2MB </small>

            @empty($location_data->location_map)
            <small class="text-muted">
            - No map uploaded yet
            </small>
            <input type="file" name="location_map" class="form-control-file" id="location_map">

            @else
            <small class="text-muted">
            - Current map: {{ $location_data->location_map }}
            </small>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="location_map" id="location_map" value="1">
                <label class="form-check-label" for="location_map">
                  Delete map
                </label>
                <!-- NOTE The maps are unlinked, not physically deleted. A copy of the image remains on the server. See LocationController.php for the logic. -->
            </div>
            @endempty
        </div>
        <hr>

        <button class="btn btn-success" type="submit">Update location <i class="fas fa-plus"></i></button>
        <a class="btn btn-danger pull-right" href="{{(route('show_all_locations'))}}">Cancel <i
                class="fas fa-ban"></i></a>
</form>
@endsection

@section('javascript')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
@endsection
