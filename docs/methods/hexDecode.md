# `hexDecode`

Decode the hex encoded string.

```php
Twine\Str::hexDecode( void ) : Twine\Str
```

## Examples

```php
$string = new Twine\Str('\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e');

$string->hexDecode(); // Returns 'john pinkerton'
```
