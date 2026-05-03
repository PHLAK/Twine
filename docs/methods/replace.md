# `replace`

Replace parts of the string with another string.

```php
Twine\Str::replace( string|array $search , string|array $replace [, int &$count = null ] ) : Twine\Str
```

## Parameters

### `$search`

One or more strings to be replaced.

### `$replace`

One or more strings to replace with.

### `&$count`

This will be set to the number of replacements performed.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->replace('john', 'bob'); // Returns 'bob pinkerton'
$string->replace(['a', 'e', 'i', 'o', 'u'], 'x'); // Returns 'jxhn pxnkxrtxn'
$string->replace(['o', 'n'], ['a', 'm']); // Returns 'jahm pimkertam'
$string->replace('n', 'x', $count); // Returns 'johx pixkertox' and $count will be 3
```
