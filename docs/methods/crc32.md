# `crc32`

Calculate the crc32 polynomial of the string.

```php
Twine\Str::crc32( void ) : int
```

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->crc32(); // Returns 3367853299
```
