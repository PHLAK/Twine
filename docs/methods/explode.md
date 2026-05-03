# `explode`

Split a string by a string.

```php
Twine\Str::explode( string $delimiter [ , int $limit = PHP_INT_MAX ] ) : array
```

## Parameters

### `$delimiter`

The boundary string.

### `$limit`

The maximum number of elements in the exploded array.

  - If limit is set and positive, the returned array will contain a maximum of limit elements with the last element containing the rest of string.
  - If the limit parameter is negative, all components except the last -limit are returned.
  - If the limit parameter is zero, then this is treated as `1`.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->explode(' '); // Returns ['john', 'pinkerton']
```

```php
$string = new Twine\Str('john maurice mcclean pinkerton');

$string->explode(' ', 3); // Returns ['john', 'maurice', 'mcclean pinkerton']
```
