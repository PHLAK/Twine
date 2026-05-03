# `padBoth`

Pad both sides of the string to a specific length.

```php
Twine\Str::padBoth( int $length [, string $padding = ' ' ] ) : Twine\Str
```

## Parameters

### `$length`

Length to pad the string to.

### `$padding`

Character to pad the string with.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->padBoth(20, '_'); // Returns '___john pinkerton___'
```
