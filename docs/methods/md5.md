# `md5`

Calculate the md5 hash of the string.

```php
Twine\Str::md5( [ bool $mode = Twine\Config\Md5::DEFAULT ] ) : Twine\Str
```

## Parameters

### `$mode`

A md5 mode flag

Available md5 modes

- `Twine\Config\Md5::DEFAULT`: Return the hash
- `Twine\Config\Md5::RAW`: Return the raw binary of the hash

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->md5(); // Returns '30cac4703a16a2201ec5cafbd600d803'
```
