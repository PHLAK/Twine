# `words`

Split the string into an array of words.

```php
Twine\Str::words( void ) : array
```

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->words(); // Returns ['john', 'pinkerton']
```

```php
$string = new Twine\Str('johnPinkerton');

$string->words(); // Returns ['john', 'Pinkerton']
```

```php
$string = new Twine\Str('john_pinkerton');

$string->words(); // Returns ['john', 'pinkerton']
```

```php
$string = new Twine\Str('john-pinkerton');

$string->words(); // Returns ['john', 'pinkerton']
```

```php
$string = new Twine\Str('JohnPinkerton');

$string->words(); // Returns ['John', 'Pinkerton']
```
