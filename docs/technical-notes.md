# Useful information for the developers

While the Alma-Primo Locate Tool is not an extremely complex application, it structure can be confusing if the right context is not given.

## Laravel

This application was made using the Laravel framework, version 8. Extensive documentation is available on the [official website](https://laravel.com/docs/7.x).

### The .env file

The `.env` file is crucial for for your application. Make sure to go through it and check that the right settings are typed in. The `.env` file includes variables such as the URL where your application will be hosted, the application's name, the Alma API key, etc.

### Config

The `/config` folder contains many settings for your application. Makes sure you go through all the files and change any settings you need.

### MVC paradigm

The APLT is based on Laravel, as a consequence it is also based on the [MVC Paradigm](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller).

### Models

The models are found in `/app`

!!! Bug
    The models need some love. Feel free to create a pull-request if you want to help us!

### Controllers

The controllers are found in `app/Http/Controllers` - This is where the magic happens!  
The controllers are extensively commented and contain a lot of information about the logic of this application. Before deploying, please spend time in the individual controllers to understand *how* this application works.

### Views

Views are found in `resources\views` - The views are, essentially, what the user is going to see. The template is found in `resources\views\layouts\app.blade.php` and it will determine most of the look-and-feel of your application.

## Alma API

APLT uses the Alma API to retrieve an institution's Alma Libraries and their Alma Locations. Extensive information is available at the [ExLibris Developer Network](https://developers.exlibrisgroup.com/alma/apis/). In this specific case we are using APIs coming from the Configuration and Administration Alma REST APIs:

* Retrieve Library: `GET /almaws/v1/conf/libraries`
* Retrieve Locations: `GET /almaws/v1/conf/libraries/{libraryCode}/locations`
* Retrieve Location: `GET /almaws/v1/conf/libraries/{libraryCode}/locations/{locationCode}`

The API calls are used in the controllers in `app\Http\Controllers`.

## Contributing

We welcome contributions to this application! Feel free to make Pull-Requests, comments, open issues, etc.
