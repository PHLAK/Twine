# `in`

Determine if the string exists in another string.

```php
Twine\Str::in( string $string [ , string $mode = Twine\Config\In::CASE_SENSITIVE ] ) : bool
```

## Parameters

### `$string`

The string to compare against

### `$mode`

Flag for case-sensitive and case-insensitive mode

Available in mode flags:

- `Twine\Config\In::CASE_SENSITIVE`: Match the string with case sensitivity (default)
- `Twine\Config\In::CASE_INSENSITIVE`: Match the string with case insensitivity

## Examples

```php
$string = new Twine\Str('pink');

$string->in('john pinkerton'); // Returns true
```

```php
$string = new Twine\Str('purple');

$string->in('john pinkerton'); // Returns false
```

```php
$string = new Twine\Str('Pink');

$string->in('john pinkerton', Twine\Config\In::CASE_INSENSITIVE); // Returns true
```

```php
$color = new Twine\Str('pink');
$name = new Twine\Str('john pinkerton');

$color->in($name); // Returns true
```
