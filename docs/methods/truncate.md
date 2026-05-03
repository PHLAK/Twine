# `truncate`

Truncate a string to a specific length and append a suffix.

```php
Twine\Str::truncate( int $length [, string $suffix = '...' ] ) : Twine\Str
```

## Parameters

### `$length`

Length string will be truncated to, including suffix

### `$suffix`

Suffix to append

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->truncate(12); // Returns 'john pink...'
$string->truncate(10, '~'); // Returns 'john pink~'
$string->truncate(8); // Returns 'john...'
```
