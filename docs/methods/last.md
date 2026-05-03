# `last`

Return a number of characters from the end of the string.

```php
Twine\Str::last( int $count ) : Twine\Str
```

## Parameters

### `$count`

The number of characters to be returned.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->last(9); // Returns 'pinkerton'
```
