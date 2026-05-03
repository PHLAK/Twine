# `uppercase`

Convert all or parts of the string to uppercase.

```php
Twine\Str::uppercase( [ string $mode = Twine\Config\Uppercase::ALL ] ) : Twine\Str
```

## Parameters

### `$mode`

An uppercase mode flag

Available uppercase modes:

- `Twine\Config\Uppercase::ALL`: Uppercase all characters of the string
- `Twine\Config\Uppercase::FIRST`: Uppercase the first character of the string
- `Twine\Config\Uppercase::WORDS`: Uppercase the first character of each word of the string

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->uppercase(); // Returns 'JOHN PINKERTON'
$string->uppercase(Twine\Config\Uppercase::FIRST); // Returns 'John pinkerton'
$string->uppercase(Twine\Config\Uppercase::WORDS); // Returns 'John Pinkerton'
```

```php
$string = new Twine\Str('john pinkerton');

$string->uppercaseFirst(); // Returns 'John pinkerton'
```

```php
$string = new Twine\Str('john pinkerton');

$string->uppercaseWords(); // Returns 'John Pinkerton'
```

## Aliases

- `Twine\Str::uppercaseFirst()` = `Twine\Str::uppercase(Twine\Config\Uppercase::FIRST)`
- `Twine\Str::uppercaseWords()` = `Twine\Str::uppercase(Twine\Config\Uppercase::WORDS)`
