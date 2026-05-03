# `url`

Encode the string to or decode it from a URL safe string.

```php
Twine\Str::url( string $mode = Twine\Config\Url::ENCODE ) : Twine\Str
```

## Parameters

### `$mode`

The string to compare against

Available url modes:

- `Twine\Config\Url::ENCODE`: Encode the string to a URL safe string
- `Twine\Config\Url::DECODE`: Decode the string from a URL safe string

## Examples

```php
$string = new Twine\Str('john+pinkerton/john=pinkerton');

$string->url(); // Returns 'john%2Bpinkerton%2Fjohn%3Dpinkerton'
```

```php
$path = new Twine\Str('/some/file/path.txt');

$path->urlencode(); // Returns '%2Fsome%2Ffile%2Fpath.txt'
```
