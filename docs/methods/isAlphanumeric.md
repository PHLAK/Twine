# `isAlphanumeric`

Determine if the string is composed of alphanumeric characters.

```php
Twine\Str::isAlphanumeric() : bool
```

## Examples

```php
$string = new Twine\Str('JohnPinkerton123');

$string->isAlphanumeric(); // Returns true
```

```php
$string = new Twine\Str('john pinkerton');

$string->isAlphanumeric(); // Returns false
```
