# `from`

Return part of the string starting from another string.

```php
Twine\Str::from( string $string ) : Twine\Str
```

## Parameters

### `$string`

The string to start from.

### `$length`

Length of substring.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->from('pink'); // Returns 'pinkerton'
$string->from('purple'); // Returns ''
```
