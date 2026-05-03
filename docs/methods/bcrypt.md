# `bcrypt`

Creates a hash from the string using the CRYPT_BLOWFISH algorithm.

```php
Twine\Str::bcrypt( [ array $options = [] ] ) : Twine\Str
```

## Parameters

### `$options`

An array of bcrypt hasing options

## Examples

```php
$string = new Twine\Str('john pinkerton');

$string->bcrypt(['salt' => 'NaClNaClNaClNaClNaClNaCl']); // Returns '$2y$10$NaClNaClNaClNaClNaClNOMtb0r8BE2WGaLqvGur17DqtgjsWl0lW'
```
