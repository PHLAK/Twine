# `append`

Append one or more strings to the string.

```php
Twine\Str::append( string ...$strings ) : Twine\Str
```

## Parameters

### `...$strings`

One or more strings to append.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->append(' jr'); // Returns 'john pinkerton jr'
```
