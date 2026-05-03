# `chunk`

Spit the string into an array of chunks of a given length.

```php
Twine\Str::chunk( int $length ) : array
```

## Parameters

### `$length`

The desired chunk length

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->chunk(3); // Returns ['joh', 'n p', 'ink', 'ert', 'on']
```
