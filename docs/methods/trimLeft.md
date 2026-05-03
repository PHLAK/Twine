# `trimLeft`

Remove whitespace or a specific set of characters from the beginning of the string.

```php
Twine\Str::trimLeft( [ string $mask = " \t\n\r\0\x0B" ] ) : Twine\Str
```

## Parameters

### `$mask`

A list of characters to be stripped

## Examples

```php
$string = new Twine\Str('  john pinkerton    ');

$string->trimLeft(); // Returns 'john pinkerton    '
```
