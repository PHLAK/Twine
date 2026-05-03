# `isAlphabetic`

Determine if the string is composed of alphabetic characters.

```php
Twine\Str::isAlphabetic() : bool
```

## Examples

```php
$string = new Twine\Str('JohnPinkerton');

$string->isAlphabetic(); // Returns true
```

```php
$string = new Twine\Str('john pinkerton');

$string->isAlphabetic(); // Returns false
```
