@extends('layouts.app')
@section('css')
@endsection
@section('content')

<h2>Custom Alerts Panel</h2>
<hr>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@elseif ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
<hr>
@endif
<h3>Add new custom alert</h3>

<!-- SECTION - Form to create new alert -->
<form action="{{route('admin_alerts')}}" method="post" id="admin-panel">
    @csrf
    <div class="form-group">
        <label for="title">Alert title</label>
        <input name="title" type="title" class="form-control" id="title"
            value="{{ old('title') ? old('title') : "" }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>
    <div class="form-group">
        <label for="custom_alert">Alert text</label>
        <input name="custom_alert" type="text" class="form-control" id="custom_alert"
            value="{{ old('custom_alert') ? old('custom_alert') : "" }}" required>
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>

    <div class="form-group">
        <label for="url">URL <p class="text-muted mb-0">The link will not be displayed if this field is left empty.</p></label>
        <input name="url" type="text" class="form-control" id="url"
            value="{{ old('url') ? old('url') : "" }}">
    </div>

    <div class="form-group">
        <label for="url_text">URL text</label>
        <input name="url_text" type="text" class="form-control" id="url_text"
            value="{{ old('url_text') ? old('url_text') : "" }}">
    </div>

    <div class="form-group">
        <label for="is_publicly_visible">Display alert? </label>
        <p class="text-muted mb-0" >Choose wether this alert should be publicly visible or not.</p>
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
        <div class="invalid-feedback">
            Please fill in this field.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr>
<h3>Currently available alerts</h3>
<div class="table-responsive" id="available-alerts">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Alert Title</th>
                <th scope="col">Link</th>
                <th scope="col">Visible to users?</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['alerts'] as $alert)
            <tr>
                <td>{{$alert->title}}</td>
                <td>
                    @if (!empty($alert->url))
                    <a href="{{$alert->url}}">{{$alert->url_text}}</a>
                    @else
                    No link added
                    @endif
                </td>
                <td>@if ($alert->is_publicly_visible == "1")
                    Yes
                    @else
                    No
                    @endif
                </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('edit_alert', ['id' => $alert->id]) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('delete_alert',$alert->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this alert?')"
                            class="btn btn-danger"
                            @if($alert->title == 'example')
                            dusk='testalert'
                            @endif
                            >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('javascript')
@endsection
