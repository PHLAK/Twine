# `wrap`

Wrap the string to a given number of characters.

```php
Twine\Str::wrap( int $width [, string $break = "\n" [, bool $mode = Twine\Config\Wrap::SOFT ]] ) : Twine\Str
```

## Parameters

### `$width`

Number of characters at which to wrap

### `$break`

Character used to break the string

### `$mode`

A wrap mode flag

Available wrap modes:

- `Twine\Config\Wrap::SOFT`: Wrap after the specified width
- `Twine\Config\Wrap::HARD`: Always wrap at or before the specified width

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->wrap(5); // Returns "john\npinkerton"
$string->wrap(5, "\n", Twine\Config\Wrap::HARD); // Returns "john\npinke\nrton"
```

```php
$string = new Twine\Str('john pinkerton');

$string->wrapSoft(5); // Returns "john\npinkerton"
```

```php
$string = new Twine\Str('john pinkerton');

$string->wrapHard(5); // Returns "john\npinke\nrton"
```

## Aliases

- `Twine\Str::wrapSoft($width, $break)` = `Twine\Str::wrap($width, $break, Twine\Config\Trim::LEFT)`
- `Twine\Str::wrapHard($width, $break)` = `Twine\Str::wrap($width, $break, Twine\Config\Trim::RIGHT)`
