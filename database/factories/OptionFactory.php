<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Option;

$factory->define(Option::class, function () {
    return [
        'opening_hours_url' => 'https://www.library.universiteitleiden.nl/using-the-library/ubl-and-corona#opening-hours',
        'opening_hours_link_is_publicly_visible' => true
    ];
});
