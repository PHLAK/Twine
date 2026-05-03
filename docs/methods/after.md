# `after`

Return part of the string occurring after a specific string.

```php
Twine\Str::after( string $string ) : Twine\Str
```

## Parameters

### `$string`

The delimiting string.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->after(' '); // Returns 'pinkerton'
```
