# `crypt`

Hash the string using the standard Unix DES-based algorithm or an
alternative algorithm that may be available on the system.

```php
Twine\Str::crypt( string $salt ) : Twine\Str
```

## Parameters

### `$salt`

A salt string to base the hashing on.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->crypt('NaCl'); // Returns 'Naq9mOMsN7Yac'
```
