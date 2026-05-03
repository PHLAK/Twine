# `to`

Return part of the string up to and including the first occurance of another string.

```php
Twine\Str::to( string $string ) : Twine\Str
```

## Parameters

### `$string`

The string to end with.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->to('pink'); // Returns 'john pink'
```

```php
$string = new Twine\Str('john pinkerton');

$string->to('purple'); // Returns ''
```
