# `encrypt`

Encrypt the string.

```php
Twine\Str::encrypt( string $key, [ string $cipher = 'AES-128-CBC' ] ) : Twine\Str
```

## Parameters

### `$key`

The key for encrypting.

### `$cipher`

The cipher method. Must be one of the following.

  - `AES-128-CBC`
  - `AES-256-CBC`

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->encrypt('secret'); // Returns something like '$DZpEm9ZFec9ybxF7$y2rc62EapV8p+xOKGaQHKA==$pKe7S3T7tf8jaXWpUHc='
```
