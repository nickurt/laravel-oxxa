## Laravel Oxxa
[![Latest Stable Version](https://poser.pugx.org/nickurt/laravel-oxxa/v/stable?format=flat-square)](https://packagist.org/packages/nickurt/laravel-oxxa)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/nickurt/laravel-oxxa/master.svg?style=flat-square)](https://travis-ci.org/nickurt/laravel-oxxa)
[![Total Downloads](https://img.shields.io/packagist/dt/nickurt/laravel-oxxa.svg?style=flat-square)](https://packagist.org/packages/nickurt/laravel-oxxa)
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
