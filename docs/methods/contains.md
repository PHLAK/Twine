# `contains`

Determine if the string contains another string.

```php
Twine\Str::contains( string $string ) : bool
```

## Parameters

### `$string`

The string to compare against.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->contains('pink'); // Returns true
$string->contains('purple'); // Returns false
```
