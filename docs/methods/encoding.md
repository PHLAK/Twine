# `encoding`

Set the internal character encoding.

```php
Twine\Str::encoding( string $encoding ) : Twine\Str
```

## Parameters

### `$encoding`

The desired character encoding

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->encoding('ASCII');
```
