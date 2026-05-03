# `repeat`

Repeat the string multiple times.

```php
Twine\Str::repeat( int $multiplier ) : Twine\Str
```

## Parameters

### `$multiplier`

Number of times to repeat the string.

## Examples

```php
$string = new Twine\Str('beetlejuice');

$string->repeat(3); // Returns 'beetlejuicebeetlejuicebeetlejuice'
```
