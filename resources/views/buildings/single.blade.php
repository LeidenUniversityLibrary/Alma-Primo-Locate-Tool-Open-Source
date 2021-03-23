@extends('layouts.app')
@section('css')
@endsection

@section('content')
<!-- SECTION content -->
<h2>{{ $building_name }}</h2>
<h3 class="text-muted">Building information preview <a class="btn btn-primary"
        href="{{ route('update_building', ['building_id' => $building_id]) }} "
        role="button">Edit</a></h3>
<div class="card align-items-center" style="width: auto;">
    <div class="card-body">
        <p class="card-text"><b>Building description: </b>{{ $building_description }}</p>
        <p class="card-text"><b>Building address: </b></p>
        <p>{{ $building_street }} {{ $building_number }}</p>
        <p>{{ $building_zip }}, {{ $building_city }}</p>
        <p>{{ $building_country }}</p>
        @if(!empty($opening_hours_url))
        <p class="card-text"><b>Opening hours url:</b></p>
        <a href="{{ $opening_hours_url }}">{{ $opening_hours_url }}</a>
        @else
        @endif
        @if(!empty($building_add_url))
        <p class="card-text"><b>Additional link:</b></p>
        <a href="{{ $building_add_url }}">{{ $building_add_text }}</a>
        @else
        @endif
    </div>

    <div class="card-img-top">
        <p class="mt-4" style="text-align:center">{!! $embed_google_map !!}</p>
    </div>
</div>
<hr>
<h3 class="text-muted">Alma locations connected to this building</h3>
<div class="table-responsive">
    <table class="table table-striped" id="buildings-table">
        <thead>
            <tr>
                <th scope="col">Location ID</th>
                <th scope="col">location_name</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['linked_locations'] as $linked_location)
            <tr>
                <td>{{$linked_location->location_id}}</td>
                <td>{{$linked_location->location_name}}</td>
                <td><a class="btn btn-primary" href="{{ route('show_location', ['location_id' => $linked_location->location_id]) }}" role="button">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
<hr>
<a href="{{ route('show_all_buildings') }}"><button type="button" class="btn btn-primary my-3"><i
            class="fas fa-chevron-circle-left"></i> Buildings overview</button></a>
<a href="{{ route('show_all_locations') }}"><button type="button" class="btn btn-primary my-3"><i
            class="fas fa-chevron-circle-left"></i> Locations overview</button></a>
@endsection

@section('javascript')
@endsection
