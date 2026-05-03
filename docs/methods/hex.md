# `hex`

Encode and decode the string to and from hex.

```php
Twine\Str::hex( [ string $mode = Config\Hex::ENCODE ] ) : Twine\Str
```

## Parameters

### `$mode`

A hex mode flag.

- `Twine\Config\Hex::ENCODE`: Encode the string to hex
- `Twine\Config\Hex::DECODE`: Decode the string from hex

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->hex(); // Returns '\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e'
```

```php
$string = new Twine\Str('\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e');

$string->hex(Twine\Config\Hex::DECODE); // Returns 'john pinkerton'
```

```php
$string = new Twine\Str('john pinkerton');

$string->hexEncode(); // Returns '\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e'
```

```php
$string = new Twine\Str('\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e');

$string->hexDecode(); // Returns 'john pinkerton'
```

## Aliases

- `Twine\Str::hexEncode()` = `Twine\Str::hex(Twine\Config\Hex::ENCODE)`
- `Twine\Str::hexDecode()` = `Twine\Str::hex(Twine\Config\Hex::DECODE)`
