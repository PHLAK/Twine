# `isPrintable`

Determine if the string is composed of printable characters.

```php
Twine\Str::isPrintable() : bool
```

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->isPrintable(); // Returns true
```

```php
$string = new Twine\Str("john\npinkerton");

$string->isPrintable(); // Returns false
```
