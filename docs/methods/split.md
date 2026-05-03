# `split`

Split the string into an array containing a specific number of chunks.

```php
Twine\Str::split( int $chunks ) : array
```

## Parameters

### `$chunks`

The number of chunks

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->split(2); // Returns ['john pi ', 'nkerton']
$string->split(3); // Returns ['john ', 'pinke', 'rton']
```
