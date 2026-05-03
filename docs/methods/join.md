# `join`

Join two strings with another string in between.

```php
Twine\Str::join( string $string [, string $glue = ' ' ] ) : Twine\Str
```

## Parameters

### `$string`

The string to be joined

### `$glue`

A string to use as the glue

## Examples

```php
$first = new Twine\Str('john');
$last = new Twine\Str('pinkerton');

$first->join($last); // Returns 'john pinkerton'
```

```php
$min = new Twine\Str('1');
$max = new Twine\Str('100');

$min->join($max, '-'); // Returns '1-100'
```

```php
$file = new Twine\Str('noclist.txt');

$file->join('bak', '.'); // Returns 'noclist.txt.bak'
```
