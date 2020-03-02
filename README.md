## Laravel Oxxa
[![Build Status](https://github.com/nickurt/laravel-oxxa/workflows/tests/badge.svg)](https://github.com/nickurt/laravel-oxxa/actions)
[![Total Downloads](https://poser.pugx.org/nickurt/laravel-oxxa/d/total.svg)](https://packagist.org/packages/nickurt/laravel-oxxa)
[![Latest Stable Version](https://poser.pugx.org/nickurt/laravel-oxxa/v/stable.svg)](https://packagist.org/packages/nickurt/laravel-oxxa)
[![MIT Licensed](https://poser.pugx.org/nickurt/laravel-oxxa/license.svg)](LICENSE.md)

### Table of contents
- [Installation](#installation)
- [Tests](#tests)
### Installation
Install this package with composer:
```
composer require nickurt/laravel-oxxa
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
composer test
```
- - - 
