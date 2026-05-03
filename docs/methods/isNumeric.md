# `isNumeric`

Determine if the string is composed of numeric characters.

```php
Twine\Str::isNumeric() : bool
```

## Examples

```php
$string = new Twine\Str('1337');

$string->isNumeric(); // Returns true
```

```php
$string = new Twine\Str('john pinkerton');

$string->isNumeric(); // Returns false
```
