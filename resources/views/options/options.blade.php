@extends('layouts.app')
@section('css')
@endsection

@section('content')
<!-- SECTION content -->

<h2>Options</h2>
<hr>
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Options are disabled</h4>
    <p>This page is a placeholder for future releases of the application.</p>
    <hr>
    <p class="mb-0">Changing any setting here will have no effect on the application. Opening hours can be edited on building level.</p>
  </div>
<form action="{{route ('update_options')}}" method="post" id="update_options_form">
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

    <h4>Opening Hours</h4>
    <div class="form-group">
        <label for="opening_hours_url">Opening hours URL</label>
        <small class="text-muted"></small>
        <input name="opening_hours_url" type="text" class="form-control" id="opening_hours_url"
            value="{{ $options->opening_hours_url }}" readonly>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>

    <div class="form-group">
        <label for="opening_hours_link_is_publicly_visible">Display opening hours?</label>
        <p class="text-muted"></p>

        @if ($options->opening_hours_link_is_publicly_visible == "1")

        <div class="form-check">
            <input class="form-check-input" type="radio" name="opening_hours_link_is_publicly_visible"
                id="opening_hours_link_is_publicly_visible_yes" value="1" checked readonly>
            <label class="form-check-label" for="opening_hours_link_is_publicly_visible_yes" readonly>
                Yes
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="opening_hours_link_is_publicly_visible"
                id="opening_hours_link_is_publicly_visible_no" value="0" readonly>
            <label class="form-check-label" for="opening_hours_link_is_publicly_visible_no">
                No
            </label>
        </div>

        @else

        <div class="form-check">
            <input class="form-check-input" type="radio" name="opening_hours_link_is_publicly_visible"
                id="opening_hours_link_is_publicly_visible_yes" value="1" readonly>
            <label class="form-check-label" for="opening_hours_link_is_publicly_visible_yes">
                Yes
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="opening_hours_link_is_publicly_visible"
                id="opening_hours_link_is_publicly_visible_no" value="0" checked readonly>
            <label class="form-check-label" for="opening_hours_link_is_publicly_visible_no">
                No
            </label>
        </div>
        @endif
    </div>

    <button class="btn btn-success" id="save-options" type="submit" disabled>Save <i class="fas fa-check"></i></button>
    <a class="btn btn-danger pull-right disabled" href="{{ route('admin_options')}}" id="cancel-save-options">Cancel <i class="fas fa-ban"></i></a>
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
