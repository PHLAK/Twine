# `substring`

Return part of the string.

```php
Twine\Str::substring( int $start [, int $length = null ] ) : Twine\Str
```

## Parameters

### `$start`

Starting position of the substring

### `$length`

Length of substring

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->substring(5, 4); // Returns 'pink'
```

## Aliases

- `Twine\Str::first($count)` = `Twine\Str::substring(0, $count)`
- `Twine\Str::last($count)` = `Twine\Str::substring(-$count)`
