# `padLeft`

Pad left side of the string to a specific length.

```php
Twine\Str::padLeft( int $length [, string $padding = ' ' ] ) : Twine\Str
```

## Parameters

### `$length`

Length to pad the string to.

### `$padding`

Character to pad the string with.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->padLeft(20, '_'); // Returns '______john pinkerton'
```
