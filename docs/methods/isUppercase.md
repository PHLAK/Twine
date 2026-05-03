# `isUppercase`

Determine if the string is composed of uppercase characters.

```php
Twine\Str::isUppercase() : bool
```

## Examples

```php
$string = new Twine\Str('JOHNPINKERTON');

$string->isUppercase(); // Returns true
```

```php
$string = new Twine\Str('JohnPinkerton');

$string->isUppercase(); // Returns false
```
