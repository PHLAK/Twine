# `base64`

Encode the string to or decode from a base64 encoded value.

```php
Twine\Str::base64( [ string $mode = Twine\Config\Base64::ENCODE ] ) : Twine\Str
```

## Parameters

### `$mode`

A base64 mode flag.

  - `Twine\Config\Base64::ENCODE`: Encode the string to base64
  - `Twine\Config\Base64::DECODE`: Decode the string from base64

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->base64(); // Returns 'am9obiBwaW5rZXJ0b24='
```

```php
$string = new Twine\Str('am9obiBwaW5rZXJ0b24=');

$string->base64(Twine\Config\Base64::DECODE); // Returns 'john pinkerton'
```

```php
$string = new Twine\Str('john pinkerton');

$string->base64Encode(); // Returns 'am9obiBwaW5rZXJ0b24='
```

```php
$string = new Twine\Str('am9obiBwaW5rZXJ0b24=');

$string->base64Decode(); // Returns 'john pinkerton'
```

## Aliases

- `Twine\Str::base64Encode()` = `Twine\Str::base64(Twine\Config\Base64::ENCODE)`
- `Twine\Str::base64Decode()` = `Twine\Str::base64(Twine\Config\Base64::DECODE)`
