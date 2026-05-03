# `sha1`

Calculate the sha1 hash of the string.

```php
Twine\Str::sha1( [ bool $mode = Twine\Config\Sha1::DEFAULT ] ) : Twine\Str
```

## Parameters

### `$mode`

A sha1 mode flag

Available sha1 modes

- `Twine\Config\Sha1::DEFAULT`: Return the hash
- `Twine\Config\Sha1::RAW`: Return the raw binary of the hash

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->sha1(); // Returns 'fcaf28c7705ba8f267472bb5aa8ad883f6bf0427'
```
