# `count`

Count the number of occurrences of a substring in the string.

```php
Twine\Str::count( string $string ) : int
```

## Parameters

### `$string`

The substring to count

## Examples

```php
$string = new Twine\Str('How much wood could a woodchuck chuck if a woodchuck could chuck wood?');

$string->count('wood'); // Returns 4
```
