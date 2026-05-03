# `isWhitespace`

Determine if the string is composed of alphabetic characters.

```php
Twine\Str::isWhitespace() : bool
```

## Examples

```php
$string = new Twine\Str(" \r\n\t");

$string->isWhitespace(); // Returns true
```

```php
$string = new Twine\Str('john pinkerton');

$string->isWhitespace(); // Returns false
```
