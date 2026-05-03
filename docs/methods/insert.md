# `insert`

Insert some text into the string at a given position.

```php
Twine\Str::insert( string $string , int $position ) : Twine\Str
```

## Parameters

### `$string`

Text to insert.

### `$position`

Position at which to insert the text.

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->insert('athan', 4); // Returns 'johnathan pinkerton'
```
