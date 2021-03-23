<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Building;

$factory->define(Building::class, function () {
    return [
        'building_name' => 'Leiden University Library - Main Building',
        'building_id' => 'main',
        'building_country' => 'Netherlands',
        'building_city' =>'Leiden',
        'building_zip' => '2311 BG',
        'building_street' => 'Witte Singel',
        'building_number' => '27',
        'embed_google_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2447.7361313060433!2d4.479238315943037!3d52.15730827079652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5c6f1a2e77ed1%3A0xa6094185eb1dc2e4!2sLeiden%20University%20Library!5e0!3m2!1sen!2snl!4v1567869128582!5m2!1sen!2snl" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
        'building_description' => 'In 1983 the Leiden University Library moved to its present location on Witte Singel in a new building by architect Bart van Kasteel. The first online catalogue became available in 1988.',
        'opening_hours_url' => 'https://example.com',
        'building_add_url' => 'https://example.com',
        'building_add_text' => 'Example link'
    ];
});
