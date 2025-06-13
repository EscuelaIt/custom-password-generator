# Custom Password Generator

A lightweight, customizable password generator by Escuelait. Ideal for generating secure, random passwords with optional symbol inclusion.

## Installation

Install via Composer:

```bash
composer require escuelait/custom-password-generator
```

## Quick Usage

```php
use Escuelait\CustomPasswordGenerator\PasswordGenerator;

$generator = new PasswordGenerator();

// Generate a 12-character password with 2 symbols (default settings)
$password = $generator->generate();

echo $password; // Example: @k1Zq9&Lm08A
```

## Configuration

You can customize both the total password length and the number of symbols:

```php
$password = (new PasswordGenerator())
    ->length(16)   // Total length of the password
    ->symbols(4)   // Number of symbols to include
    ->generate();

echo $password; // Example: %aB3#XgF1$Ld9&kM
```

> ⚠️ If the number of symbols exceeds the total password length, an `InvalidArgumentException` will be thrown.

## How It Works

* **Character sets used:**

  * Letters: `a-z`, `A-Z`
  * Numbers: `0-9`
  * Symbols: `!@#$%&*()_+-=[]{}|;:,.<>?`

* **Defaults:**

  * Length: `12`
  * Symbols: `2`

* **Fluent methods:**

  * `length(int $length)` — Set total password length.
  * `symbols(int $symbols)` — Set number of symbols.

## Example

```php
use Escuelait\CustomPasswordGenerator\PasswordGenerator;

$password = (new PasswordGenerator())
    ->length(20)
    ->symbols(5)
    ->generate();

echo $password;
```

## ❗ Exceptions

If the number of requested symbols exceeds the total length:

```php
InvalidArgumentException: The number of symbols cannot exceed the total password length
```

## Future Improvements

* Unit tests
* Option to exclude ambiguous characters
* CLI version

## License

This package is open-sourced under the [MIT license](LICENSE).