# `equals`

Determine if the string is equal to another string.

```php
Twine\Str::equals( string $string [, string $mode = Twine\Config\Equals::CASE_SENSITIVE ] ) : bool
```

## Parameters

### `$string`

The string to compare against.

### `$mode`

An equals mode flag.

  - `Twine\Config\Equals::CASE_SENSITIVE`: Match the string with case sensitivity
  - `Twine\Config\Equals::CASE_INSENSITIVE`: Match the string with case insensitivity

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->equals('john pinkerton'); // Returns true
$string->equals('JoHN PiNKeRToN'); // Returns false
$string->equals('JoHN PiNKeRToN', Twine\Config\Equals::CASE_INSENSITIVE); // Returns true
$string->equals('BoB BeLCHeR', Twine\Config\Equals::CASE_INSENSITIVE); // Returns false
```

## Aliases

- `Twine\Str::insensitiveMatch($string)` = `Twine\Str::equals($string, Twine\Config\Equals::CASE_INSENSITIVE)`
