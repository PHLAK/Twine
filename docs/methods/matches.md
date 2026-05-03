# `matches`

Determine if the string matches a regular expression pattern.

```php
Twine\Str::matches( string $patern ) : bool
```

## Parameters

### `$patern`

A regular expression pattern

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->matches('/[a-z]+ [a-z]+/'); // Returns true
$string->matches('/[0-9]+/'); // Returns false
```
