# `format`

Return a formatted string.

```php
Twine\Str::format( mixed ...$args ) : Twine\Str
```

## Parameters

### `...$args`

Any number of elements to fill the string

## Examples

```php
$string = new Twine\Str('Hello %s! Welcome to %s, population %b.');

$string->format('John', 'Pinkertown', 1337); // Returns 'Hello John! Welcome to Pinkertown, population 10100111001.'
```
