# `wrapSoft`

Wrap the string after the first whitespace character after a given number of characters.

```php
Twine\Str::wrapSoft( int $width [, $break = "\n" ] ) : Twine\Str
```

## Parameters

### `$width`

Number of characters at which to wrap.

### `$break`

Character used to break the string.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->wrapSoft(5); // Returns "john\npinkerton"
```
