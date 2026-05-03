# `insensitiveMatch`

Determine if the string matches another string regardless of case.

```php
Twine\Str::insensitiveMatch( string $string ) : bool
```

## Parameters

### `$string`

The string to compare against

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->insensitiveMatch('JoHN PiNKeRToN'); // Returns true
$string->insensitiveMatch('BoB BeLCHeR'); // Returns false
```
