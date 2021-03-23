<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alert;
use Faker\Generator as Faker;

$factory->define(Alert::class, function (Faker $faker) {
    return [
        'title' => 'This is a custom alert!',
        'custom_alert' => 'You can have multiple custom alerts active at the same time. Custom alerts are useful to inform your users about any future maintenence or disruption.',
        'is_publicly_visible' => true,
        'url' => 'https://example.com',
        'url_text' => 'Example Link'
    ];
});
