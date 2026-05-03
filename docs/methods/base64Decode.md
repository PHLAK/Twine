# `base64Decode`

Decode the base64 encoded string.

```php
Twine\Str::base64Decode( void ) : Twine\Str
```

## Examples

```php
$string = new Twine\Str('am9obiBwaW5rZXJ0b24=');

$string->base64Decode(); // Returns 'john pinkerton'
```
