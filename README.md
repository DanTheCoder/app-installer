# App Installer for Laravel

A one-click setup wizard installer for Laravel applications that simplifies the set up process for non-technical persons, allowing them to quickly configure and deploy their applications.

## Installation

You can install the package via composer:

```bash
composer require danthecoder/app-installer
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="app-installer-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="app-installer-views"
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

-   [DanTheCoder](https://github.com/DanTheCoder)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
