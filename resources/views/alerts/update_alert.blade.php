@extends('layouts.app')
@section('css')
@endsection
@section('content')
<h2>Admin Panel</h2>
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
<hr>
<h2>Update Custom Alert</h2>
<!-- SECTION - Form to update alert -->
<form action="{{ route('update_alert', ['id' => $alert_data->id]) }}" method="post" id="update-panel">
    @csrf
    <div class="form-group">
        <label for="title">Alert title</label>
        <input name="title" type="title" class="form-control" id="title"
            value="{{ $alert_data->title }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>
    <div class="form-group">
        <label for="custom_alert">Alert text</label>
        <input name="custom_alert" type="text" class="form-control" id="custom_alert"
            value="{{ $alert_data->custom_alert }}" required>
            <div class="invalid-feedback">
                Please fill in this field.
            </div>
    </div>
    <div class="form-group">
        <label for="url">URL</label>
        <input name="url" type="text" class="form-control" id="url"
            value="{{ $alert_data->url }}">
    </div>
    <div class="form-group">
        <label for="url_text">URL text</label>
        <input name="url_text" type="text" class="form-control" id="url_text"
            value="{{ $alert_data->url_text }}">
    </div>
    <div class="form-group">
        <label for="is_publicly_visible">Display alert? <span class="text-muted">Choose wether this alert should be publicly visible or not.</span></label>
        @if ($alert_data->is_publicly_visible == "1")

        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_publicly_visible"
                id="is_publicly_visible_no" value="0">
            <label class="form-check-label" for="is_publicly_visible_no">
                No
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_publicly_visible"
                id="is_publicly_visible_yes" value="1" checked>
            <label class="form-check-label" for="is_publicly_visible_yes">
                Yes
            </label>
        </div>
        @else
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_publicly_visible"
                id="is_publicly_visible_no" value="0" checked>
            <label class="form-check-label" for="is_publicly_visible_no">
                No
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_publicly_visible"
                id="is_publicly_visible_yes" value="1">
            <label class="form-check-label" for="is_publicly_visible_yes">
                Yes
            </label>
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a class="btn btn-danger" href="{{ route('admin_alerts') }}" role="button">Cancel</a>
</form>
<hr>
@endsection
@section('javascript')
@endsection
