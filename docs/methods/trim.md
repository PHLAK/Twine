# `trim`

Remove white space or a specific set of characters from the beginning and/or end of the string.

```php
Twine\Str::trim( [ string $mask = " \t\n\r\0\x0B" [, string $mode = Config\Trim::BOTH ]] ) : Twine\Str
```

## Parameters

### `$mask`

A list of characters to be stripped

### `$mode`

A trim mode flag

Available trim modes:

- `Twine\Config\Trim::BOTH`: Trim characters from the beginning and end of the string
- `Twine\Config\Trim::LEFT`: Only trim characters from the beginning of the string
- `Twine\Config\Trim::RIGHT`: Only trim characters from the end of the string

## Examples

```php
$string = new Twine\Str('  john pinkerton    ');

$string->trim(); // Returns 'john pinkerton'
$string->trim(Twine\Config\Trim::LEFT); // Returns 'john pinkerton    '
$string->trim(Twine\Config\Trim::RIGHT); // Returns '  john pinkerton'
```

```php
$string = new Twine\Str('john pinkerton');

$string->trim('jton'); // Returns 'hn pinker'
```

```php
$string = new Twine\Str('  john pinkerton    ');

$string->trimLeft(); // Returns 'john pinkerton    '
```

```php
$string = new Twine\Str('  john pinkerton    ');

$string->trimRight(); // Returns '  john pinkerton'
```

## Aliases

- `Twine\Str::trimLeft($mask)` = `Twine\Str::trim($mask, Twine\Config\Trim::LEFT)`
- `Twine\Str::trimRight($mask)` = `Twine\Str::trim($mask, Twine\Config\Trim::RIGHT)`
