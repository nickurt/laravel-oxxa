## Laravel Oxxa
[![GitHub release](https://img.shields.io/github/release/nickurt/laravel-oxxa.svg)](https://github.com/nickurt/laravel-oxxa/releases)
[![GitHub license](https://img.shields.io/github/license/nickurt/laravel-oxxa.svg)](https://github.com/nickurt/laravel-oxxa)
### Table of contents
- [Installation](#installation)
- [Tests](#tests)
### Installation
Install this package with composer:
```
composer require nickurt/laravel-oxxa
```
Add the provider to config/app.php file
```php
'nickurt\Oxxa\ServiceProvider',
```
and the facade in the file
```php
'Oxxa' => 'nickurt\Oxxa\Facade',
```
Copy the config files for the Oxxa-plugin
```
php artisan vendor:publish --provider="nickurt\Oxxa\ServiceProvider" --tag="config"
```
Add the Oxxa credentials to your .env file
```
OXXA_DEFAULT_USERNAME=
OXXA_DEFAULT_PASSWORD=
```
### Tests
```sh
phpunit
```
- - - 