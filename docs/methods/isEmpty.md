# `isEmpty`

Determine if the string is empty.

```php
Twine\Str::isEmpty() : bool
```

## Examples

```php
$string = new Twine\Str('');

$string->isEmpty(); // Returns true
```

```php
$string = new Twine\Str('john pinkerton');

$string->isEmpty(); // Returns false
```
