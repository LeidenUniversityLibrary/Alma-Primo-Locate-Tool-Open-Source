@extends('layouts.app')
@section('css')
@endsection

@section('content')
<!-- SECTION content -->

<!-- SECTION Alerts -->
@foreach($data['alerts'] as $alert)
    @if($alert->is_publicly_visible == '1')

        <div class="alert alert-warning p-4 role=" alert">
            <h4 class="alert-heading">{{ $alert->title }}</h4>
            <p>{{ $alert->custom_alert }}</p>
            @if(!empty($alert->url))
                <a href="{{ $alert->url }}">{{ $alert->url_text }}</a>
            @endif
            @auth
                <a name="manage-alerts" id="manage-alerts" class="btn btn-primary"
                    href="{{ route('admin_alerts') }}" role="button">Manage alerts</a>
            @endauth
        </div>
    @endif
@endforeach
<!-- END Alerts -->

<hr>
<div class="row">
    <div class="col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">{{ $building_data->building_name }}</h5>
                <p class="card-text text-left">{{ $building_data->building_description }}</p>
                @if(!empty($building_data->building_add_url))
                <a href="{{ $building_data->building_add_url }}">{{ $building_data->building_add_text }}</a>
                @else
                @endif
                <hr>
                <div class="map-responsive mt-3">
                    <p style="text-align:center">{!! $building_data->embed_google_map !!}</p>
                </div>


                <div class="row justify-content-center">
                    <div class="col">
                    <ul class="list-group list-group-flush list-unstyled text-center d-flex justify-content-center align-items-center p-2">
                        <li><b>Address:</b></li>
                        <li class="">{{ $building_data->building_street }} {{ $building_data->building_number }}
                        </li>
                        <li>{{ $building_data->building_zip }}, {{ $building_data->building_city }}</li>
                        <li>{{ $building_data->building_country }}</li>
                    </ul>
                    </div>
                    @if(!empty($building_data->opening_hours_url))
                    <div class="col d-flex align-items-center justify-content-center">
                    <a class="btn btn-primary" name="opening-hours" id="opening-hours" href="{{ $building_data->opening_hours_url }}" role="button">Opening Hours <sup><i class="fas fa-external-link-alt"></i></sup></a>
                    </div>
                    @endif

                </div>
                @auth
                <a name="manage-building" id="manage-building" class="btn btn-primary mt-3" href="{{ route('update_building', ['building_id' => $building_data->building_id]) }}" role="button">Edit this building</a>
                @endauth
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                @if(!empty($location_data->location_name_override))
                    <h5 class="card-title">{{ $location_data->location_name_override }}</h5>
                @else
                    <h5 class="card-title">{{ $location_data->location_name }}</h5>
                @endif
                <ul class="list-group list-group-flush">
                    @if($location_data->location_floor == 'no_floor')
                    @else
                    <li class="list-group-item">Floor: {{ $location_data->location_floor }}</li>
                    @endif
                    @if(!empty($location_data->room_name))
                    <li class="list-group-item">{{ $location_data->room_name }}</li>
                    @else
                    @endif
                @empty($location_data->location_map)
                @else
                    <li class="list-group-item">
                        <div class="location_map">
                            <h5>Map</h5>
                            <img class="img-fluid" src="{{ asset ($location_data->location_map) }}"
                                alt="{{ $location_data->location_id }} map">
                        </div>
                    </li>
                @endEmpty

                </ul>
                @if(!empty($location_data->location_description))
                    <p class="card-text text-left" id='locationDescription'>{{ $location_data->location_description }}</p>
                @endif
                @if(!empty($location_data->location_additional_info_link))
                    <p class="card-text" id='locationAdditionalData'>
                        <a
                            href="{{ $location_data->location_additional_info_link }}">{{ $location_data->location_additional_info }}</a>
                    </p>
                @endif
                @auth
                <a name="manage-location" id="manage-location" class="btn btn-primary mt-3" href="{{ route('update_location', ['location_id' => $location_data->location_id]) }}" role="button">Edit this location</a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
@endsection
