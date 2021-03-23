@extends('layouts.app')
@section('css')
@endsection

@section('content')
<!-- SECTION content -->

<h2>Create a new building</h2>
<form action="{{route ('create_new_building')}}" method="post" id="create-new-building-form">
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

    <h4>Building name and ID code</h4>
    <div class="form-group">
        <label for="building_name">Building name</label>
        <input name="building_name" type="text" class="form-control" id="building_name"
            value="{{ old('building_name') ? old('building_name') : "" }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>

    <div class="form-group">
        <label for="building_id">Building ID code</label>
        <small class="text-muted">Insert a code to identify this building (4 to 5 characters max)</small>
        <input name="building_id" type="text" class="form-control" id="building_id"
            value="{{ old('building_id') ? old('building_id') : "" }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>

    <h4>Address</h4>

    <div class="form-group">
        <label for="building_country">Country</label>
        <input name="building_country" type="text" class="form-control" id="building_country"
            value="{{ old('building_country') ? old('building_country') : "" }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>

    <div class="form-group">
        <label for="building_city">City</label>
        <input name="building_city" type="text" class="form-control" id="building_city"
            value="{{ old('building_city') ? old('building_city') : "" }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>

    <div class="form-group">
        <label for="building_zip">Postcode</label>
        <input name="building_zip" type="text" class="form-control" id="building_zip"
            value="{{ old('building_zip') ? old('building_zip') : "" }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>

    <div class="form-group">
        <label for="building_street">Street</label>
        <input name="building_street" type="text" class="form-control" id="building_street"
            value="{{ old('building_street') ? old('building_street') : "" }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>

    <div class="form-group">
        <label for="building_number">Number</label>
        <input name="building_number" type="text" class="form-control" id="building_number"
            value="{{ old('building_number') ? old('building_number') : "" }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>
    <hr>
    <h4>Opening hours</h4>
    <div class="form-group">
        <label for="opening_hours_url">Opening hours url</label>
        <small class="text-muted">Button will not display if this field is left empty (optional)</small>
        <input name="opening_hours_url" type="text" class="form-control" id="opening_hours_url"
            value="{{ old('opening_hours_url') ? old('opening_hours_url') : "" }}">
        <div class="invalid-feedback">
            The url must start with "http"!
        </div>
    </div>

    <hr>
    <h4> Google Maps</h4>

    <div class="form-group">
        <label for="embed_google_map"></label>
        <small class="text-muted">Insert Google Maps' embed code (optional) </small>
        <input name="embed_google_map" type="text" class="form-control" id="building_embed_google_map"
            placeholder="<iframe>...</iframe>" value="{{ old('embed_google_map') ? old('embed_google_map') : "" }}">
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>
    <hr>
    <h4>Additional information</h4>
    <div class="form-group">
        <label for="building_description"></label>
        <small class="text-muted">Add any information that might be useful for the visitor here (optional)
        </small>
        <input name="building_description" type="text" class="form-control" id="building_description"
            value="{{ old('building_description') ? old('building_description') : "" }}">
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>
<hr>
    <div class="form-group">
        <label for="building_add_url">Additional link</label>
        <small class="text-muted">Must be a valid url. No link will display if empty (optional)</small>
        <input name="building_add_url" type="text" class="form-control" id="building_add_url"
            value="{{ old('building_add_url') ? old('building_add_url') : "" }}">
    </div>

    <div class="form-group">
        <label for="building_add_text">Additional link text</label>
        <small class="text-muted">Enter a text for your URL. This will become clickable (optional)</small>
        <input name="building_add_text" type="text" class="form-control" id="building_add_text"
            value="{{ old('building_add_text') ? old('building_add_text') : "" }}">
    </div>

    <button class="btn btn-success" id="add-building" type="submit">Add building <i class="fas fa-plus"></i></button>
    <a class="btn btn-danger pull-right" href="{{ route('admin_alerts') }}" id="cancel-add-building">Cancel <i class="fas fa-ban"></i></a>
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
