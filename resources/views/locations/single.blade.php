@extends('layouts.app')
@section('css')
@endsection

@section('content')
<!-- SECTION content -->
<h2>{{ $location_data->location_name }} / {{ $location_data->location_id }} </h2>
<h3 class="text-muted">Location information preview <a class="btn btn-primary"
        href="{{ route('update_location', ['location_id' => $location_data->location_id]) }} "
        role="button">Edit</a></h3>
<div class="table-responsive-lg">
    <table class="table table-striped">
        <tbody>
            <tr>
                <th scope="row">Alma Location name</th>
                <td>{{ $location_data->location_name }}</td>
            </tr>

            <tr>
                <th scope="row">Alma Location name override</th>
                <td>{{ $location_data->location_name_override }}</td>
            </tr>

            <tr>
                <th scope="row">Alma location ID</th>
                <td>{{ $location_data->location_id }}</td>
            </tr>
            <tr>
                <th scope="row">Building</th>
                <td>{{ $building_data->building_name }}</td>
            </tr>
            <tr>
                <th scope="row">Floor</th>
                <td>{{ $location_data->location_floor }}</td>
            </tr>
            <tr>
                <th scope="row">Room name</th>
                <td>{{ $location_data->room_name }}</td>
            </tr>
            <tr>
                <th scope="row">Location map</th>
                <td>
                @empty($location_data->location_map)
                    No map uploaded
                    @endempty
                    {{ $location_data->location_map }}</td>
            </tr>
            <tr>
                <th scope="row">Additional information</th>

                <td> @empty($location_data->location_description)
                    No additional information inserted
                    @endempty
                    {{ $location_data->location_description }}</td>
            </tr>
        </tbody>
    </table>
</div>
<hr>
<a href="{{ route('show_all_buildings') }}"><button type="button" class="btn btn-primary my-3"><i
            class="fas fa-chevron-circle-left"></i> Buildings overview</button></a>
<a href="{{ route('show_all_locations') }}"><button type="button" class="btn btn-primary my-3"><i
            class="fas fa-chevron-circle-left"></i> Locations overview</button></a>
<!-- SECTION right column -->
<div class="col-12 col-lg-4">
    <div class="well mt-1">
    </div>
</div>
@endsection

@section('javascript')
@endsection
