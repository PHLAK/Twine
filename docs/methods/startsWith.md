# `startsWith`

Determine if the string starts with another string.

```php
Twine\Str::startsWith( string $string ) : bool
```

## Parameters

### `$string`

The string to compare against

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->startsWith('john'); // Returns true
$string->startsWith('pinkerton'); // Returns false
```
