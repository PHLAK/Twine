# `before`

Return part of the string occurring before a specific string.

```php
Twine\Str::before( string $string ) : Twine\Str
```

## Parameters

### `$string`

The delimiting string

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->before(' '); // Returns 'john'
```
