# WterBerg / Laravel No Common Passwords

[github.com/WterBerg/laravel-no-common-passwords](https://github.com/WterBerg/laravel-no-common-passwords)

Provides [Laravel](https://laravel.com/) validation rules to check passwords against a [list of commonly used passwords](https://github.com/wikimedia/mediawiki-libs-CommonPasswords).

## License

View the `LICENSE.md` file for licensing details.

## Installation

Installation of [`wterberg/laravel-no-common-passwords`](https://packagist.org/packages/wterberg/laravel-no-common-passwords) is done via [Composer](https://getcomposer.org).

```shell
composer require wterberg/laravel-no-common-passwords
```

## Usage

Simply register the provided validation rules in your Laravel Validator instances.

```php
use WterBerg\Laravel\NoCommonPasswords\Rules\NoCommonPassword;

...

$validator = Validator::make(
    $dataToValidate,
    ['password' => ['required', 'string', 'min:8', new NoCommonPassword()]]
);
```

## Translations

This project uses the following translatable strings:

| Translatable strings                |
|-------------------------------------|
| "Common passwords are not allowed." |

Note: The project provides no translation files. Consuming projects are free to provide their own translations for the languages that are relevant.
