# `decrypt`

Decrypt the string.

```php
Twine\Str::decrypt( string $key, [ string $cipher = 'AES-128-CBC' ] ) : Twine\Str
```

## Parameters

### `$key`

The key for decrypting.

### `$cipher`

The cipher method. Must be one of the following.

  - `AES-256-CBC`
  - `AES-128-CBC`

## Examples

```php
$string = new Twine\Str('$DZpEm9ZFec9ybxF7$y2rc62EapV8p+xOKGaQHKA==$pKe7S3T7tf8jaXWpUHc=');

$string->decrypt('secret'); // Returns 'john pinkerton'
```
