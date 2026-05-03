# `similarity`

Calculate the similarity percentage between two strings.

```php
Twine\Str::similarity( string $string ) : float
```

## Parameters

### `$string`

The string to compare against.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->similarity('jim ponkerten'); // Returns 66.666666666667
```
