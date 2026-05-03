# `pad`

Pad the string to a specific length.

```php
Twine\Str::pad( int $length [, string $padding = ' ' [, int $mode = Twine\Config\Pad::RIGHT ]] ) : Twine\Str
```

## Parameters

### `$length`

Length to pad the string to

### `$padding`

Character to pad the string with

### `$mode`

A pad mode flag

Available pad modes

- `Twine\Config\Pad::RIGHT`: Only pad the right side of the string
- `Twine\Config\Pad::LEFT`: Only pad the left side of the string
- `Twine\Config\Pad::BOTH`: Pad both sides of the string

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->pad(20, '_');  // Returns 'john pinkerton______'
$string->pad(20, '_', Twine\Config\Pad::LEFT); // Returns '______john pinkerton'
$string->pad(20, '_', Twine\Config\Pad::BOTH); // Returns '___john pinkerton___'
```

```php
$string = new Twine\Str('john pinkerton');

$string->padRight(20, '_');  // Returns 'john pinkerton______'
```

```php
$string = new Twine\Str('john pinkerton');

$string->padLeft(20, '_'); // Returns '______john pinkerton'
```

```php
$string = new Twine\Str('john pinkerton');

$string->padBoth(20, '_'); // Returns '___john pinkerton___'
```

## Aliases

- `Twine\Str::padRight($length, $padding)` = `Twine\Str::pad($length, $padding, Twine\Config\Pad::RIGHT)`
- `Twine\Str::padLeft($length, $padding)` = `Twine\Str::pad($length, $padding, Twine\Config\Pad::LEFT)`
- `Twine\Str::padBoth($length, $padding)` = `Twine\Str::pad($length, $padding, Twine\Config\Pad::BOTH)`
