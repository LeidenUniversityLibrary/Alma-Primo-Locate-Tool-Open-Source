# PHP & Database requirements

This app is based on [Laravel 7.30.4](https://laravel.com/docs/7.x/releases) and has, therefore, the same requirements[^1].

## Primo, Alma, Alma API

As the name suggest, you will need ExLibris' Primo and Alma to make use of this application.  
Furthermore, **you will need an Alma API key** that allows you to access the Alma Locations of your Alma Libraries. Alma API keys can be generated via the [ExLibris Developer Network](https://developers.exlibrisgroup.com/). Please contact ExLibris for more information about Alma and Primo API keys.

!!! Warning
    This application has been tested only on a **non-VE Primo environment**; we have no experience with VE yet, but we expect our application to work just as well.

## Server

### PHP requirements

* PHP >= 7.2.5
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

### Database requirements

* MySQL 5.7+
* PostgreSQL 9.6+
* SQLite 3.8.8+
* SQL Server 2017+

[^1]: Update to [Laravel 8.x](https://laravel.com/docs/8.x/releases) is planned. No breaking changes are expected.
