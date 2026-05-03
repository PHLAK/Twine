# `wrapHard`

Wrap the string after an exact number of characters.

```php
Twine\Str::wrapHard( int $width [, $break = "\n" ] ) : Twine\Str
```

## Parameters

### `$width`

Number of characters at which to wrap.

### `$break`

Character used to break the string.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->wrapHard(5); // Returns "john\npinke\nrton"
```
