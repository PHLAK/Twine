# `nth`

Get every nth character of the string.

```php
Twine\Str::nth( int $step [ , int $offset = 0 ] ) : Twine\Str
```

## Parameters

### `$step`

The number of characters to step

### `$offset`

The string offset to start at

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->nth(3); // Returns 'jnieo'
$string->nth(3, 2); // Returns 'hpkt'
```
