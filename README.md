# Laravel Flows ⚡

[![Latest Version on Packagist](https://img.shields.io/packagist/v/flavorly/laravel-flows.svg?style=flat-square)](https://packagist.org/packages/flavorly/laravel-flows)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/flavorly/laravel-flows/run-tests?label=tests)](https://github.com/flavorly/laravel-flows/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/flavorly/laravel-flows/Check%20&%20fix%20styling?label=code%20style)](https://github.com/flavorly/laravel-flows/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/flavorly/laravel-flows.svg?style=flat-square)](https://packagist.org/packages/flavorly/laravel-flows)

A simple package to manage flows in your Laravel application.
This package aims to provider a "ticketing" system to manage the flow of a certain Model

So lets say you have orders, but a order can be retried many times, but you want to know exactly
what happened on that "flow" of the order, so you can use this package to manage that
The flow also aims to store some additional context if requires, so you can store the request payload, the response payload, the error message, etc


## Installation

You can install the package via composer:

```bash
composer require flavorly/laravel-flows
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="flows-config"
```

You can publish migrations

```bash
php artisan vendor:publish --tag="flows-migrations"
php artisan migrate
```

## Testing

```bash
composer test
```

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [jon](https://github.com/flavorly)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
