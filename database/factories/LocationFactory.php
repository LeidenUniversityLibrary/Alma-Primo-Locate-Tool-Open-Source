<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;


$factory->define(Location::class, function () {
    return [
        'building_id' => 'main',
        'location_id' => 'OPM16',
        'room_name' => 'S-UB',
        'location_name' => 'S-UB: Art History',
        'location_additional_info' => 'Eu nisl nunc mi ipsum faucibus vitae aliquet',
        'location_additional_info_link' => 'https://example.com',
        'location_floor' => '-1',
        'location_map' => '',
        'location_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Integer vitae justo eget magna fermentum iaculis eu non. Eget egestas purus viverra accumsan in nisl nisi scelerisque eu.',
    ];
});
