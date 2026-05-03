# `isPunctuation`

Determine if the string is composed of punctuation characters.

```php
Twine\Str::isPunctuation() : bool
```

## Examples

```php
$string = new Twine\Str('*&$();,.?');

$string->isPunctuation(); // Returns true
```

```php
$string = new Twine\Str('john pinkerton');

$string->isPunctuation(); // Returns false
```
