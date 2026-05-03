# `strip`

Remove one or more strings from the string.

```php
Twine\Str::strip( string|array $search ) : Twine\Str
```

## Parameters

### `$search`

One or more strings to be removed.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->strip('pink'); // Returns 'john erton'
```

```php
$string = new Twine\Str('john pinkerton');

$string->strip(['a', 'e', 'i', 'o', 'u']); // Returns 'jhn pnkrtn'
```
