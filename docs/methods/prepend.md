# `prepend`

Prepend one or more strings to the string.

```php
Twine\Str::prepend( string ...$strings ) : Twine\Str
```

## Parameters

### `...$strings`

One or more strings to append

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->prepend('mr '); // Returns 'mr john pinkerton'
```

```php
$first = new Twine\Str('john');
$last = new Twine\Str('pinkerton');

$last->prepend('mr', ' ', $first); // Returns 'mr john pinkerton'
```

## Aliases

- `Twine\Str::first($count)` = `Twine\Str::substring(0, $count)`
- `Twine\Str::last($count)` = `Twine\Str::substring(-$count)`
