# `first`

Return a number of characters from the start of the string.

```php
Twine\Str::first( int $count ) : Twine\Str
```

## Parameters

### `$count`

The number of characters to be returned

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->first(4); // Returns 'john'
```
