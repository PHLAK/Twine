# `trimRight`

Remove whitespace or a specific set of characters from the end of the string.

```php
Twine\Str::trimRight( [ string $mask = " \t\n\r\0\x0B" ] ) : Twine\Str
```

## Parameters

### `$mask`

A list of characters to be stripped.

## Examples

```php
$string = new Twine\Str('  john pinkerton    ');

$string->trimRight(); // Returns '  john pinkerton'
```
