# `padRight`

Pad right side of the string to a specific length.

```php
Twine\Str::padRight( int $length [, string $padding = ' ' ] ) : Twine\Str
```

## Parameters

### `$length`

Length to pad the string to.

### `$padding`

Character to pad the string with.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->padRight(20, '_');  // Returns 'john pinkerton______'
```
