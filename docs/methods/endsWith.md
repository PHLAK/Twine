# `endsWith`

Determine if the string ends with another string.

```php
Twine\Str::endsWith( string $string ) : bool
```

## Parameters

### `$string`

The string to compare against.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->endsWith('pinkerton'); // Returns true
$string->endsWith('john'); // Returns false
```
