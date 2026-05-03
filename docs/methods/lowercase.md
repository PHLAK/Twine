# `lowercase`

Convert all or parts of the string to lowercase.

```php
Twine\Str::lowercase( [ string $mode = Twine\Config\Lowercase::ALL ] ) : Twine\Str
```

## Parameters

### `$mode`

A lowercase mode flag.

Available lowercase modes:

- `Twine\Config\Lowercase::ALL`: Lowercase all characters of the string
- `Twine\Config\Lowercase::FIRST`: Lowercase the first character of the string
- `Twine\Config\Lowercase::WORDS`: Lowercase the first character of each word of the string

## Examples

```php
$string = new Twine\Str('JOHN PINKERTON');

$string->lowercase(); // Returns 'john pinkerton'
$string->lowercase(Twine\Config\Lowercase::FIRST); // Returns 'jOHN PINKERTON'
$string->lowercase(Twine\Config\Lowercase::WORDS); // Returns 'jOHN pINKERTON'
```

```php
$string = new Twine\Str('JOHN PINKERTON');

$string->lowercaseFirst(); // Returns 'jOHN PINKERTON'
```

```php
$string = new Twine\Str('JOHN PINKERTON');

$string->lowercaseWords(); // Returns 'jOHN pINKERTON'
```

## Aliases

- `Twine\Str::lowercaseFirst()` = `Twine\Str::lowercase(Twine\Config\Lowercase::FIRST)`
- `Twine\Str::lowercaseWords()` = `Twine\Str::lowercase(Twine\Config\Lowercase::WORDS)`
