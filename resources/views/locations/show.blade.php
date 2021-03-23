@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
@endsection
@section('content')
<!-- SECTION content -->
<h2>Locations overview</h2>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
    <table class="table table-striped" style="width:100%" id="locations-table">
        <thead>
            <tr>
                <th scope="col">Location Name</th>
                <th scope="col">Building ID</th>
                <th scope="col">View/Edit/Delete</th>
                <th scope="col">Public Preview</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
            <tr>
                <td>
                @if(!empty($location->location_name_override))
                <p>{{$location->location_name_override}}</p>
                <p><b>Original Alma name:</b> {{$location->location_name}}</p>
                @else
                {{$location->location_name}}</td>
                @endif
                <td><a class="btn btn-primary"
                    href="{{ route('show_building', ['building_id' => $location->building_id]) }} " role="button">{{$location->building_id}}</a></td>
                <td>
                    <form action="{{ route('delete_location',$location->location_id) }}" method="POST">

                        <a class="btn btn-success" href="{{ route('show_location', ['location_id' => $location->location_id]) }}">View</a>

                        <a class="btn btn-warning" href="{{ route('update_location', ['location_id' => $location->location_id]) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button
                        @if ($location->location_id === 'BAND')
                            dusk='delete_test_location'
                        @endif
                        type="submit" onclick="return confirm('Are you sure you want to delete this location?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('show_results', ['location_id' => $location->location_id]) }} " role="button">Public Preview</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <a class="btn btn-primary" id="create-new-location" href="{{ route('create_new_location')}}">Create new location</a>
@endsection
@section('javascript')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/datatable.js') }}"></script>
@endsection
