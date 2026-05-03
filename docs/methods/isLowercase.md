# `isLowercase`

Determine if the string is composed of lowercase characters.

```php
Twine\Str::isLowercase() : bool
```

## Examples

```php
$string = new Twine\Str('johnpinkerton');

$string->isLowercase(); // Returns true
```

```php
$string = new Twine\Str('JohnPinkerton');

$string->isLowercase(); // Returns false
```
