# `isNotEmpty`

Determine if the string is not empty.

```php
Twine\Str::isNotEmpty() : bool
```

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->isNotEmpty(); // Returns true
```

```php
$string = new Twine\Str('');

$string->isNotEmpty(); // Returns false
```
