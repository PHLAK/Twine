# `characters`

Split the string into an array of characters.

```php
Twine\Str::characters( [ $mode = Twine\Config\Characters::ALL ] )  : array
```

## Parameters

### `$mode`

A characters mode flag

  - `Twine\Config\Characters::ALL`: Return all characters in the string
  - `Twine\Config\Characters::UNIQUE`: Return each character only once ignoring duplicate characters

## Examples

```php
$string = new Twine\Str('john pinkerton');

$characters = $string->characters(); // Returns  ['j', 'o', 'h', 'n', ' ', 'p', 'i', 'n', 'k', 'e', 'r', 't', 'o', 'n']
```

```php
$string = new Twine\Str('john pinkerton');

$characters = $string->characters(Twine\Config\Characters::UNIQUE); // Returns ['j', 'o', 'h', 'n', ' ', 'p', 'i', 'k', 'e', 'r', 't']
```
