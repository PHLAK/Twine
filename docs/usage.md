# Usage

## Import & Instantiation

Once installed, you can start using Twine by importing the library.

```php
use PHLAK\Twine;

// ...
```

Next, instantiate a Twine `Str` object. There are multiple ways to accomplish
this and no single method is inherently better than the others.

The default approach is to create a `Twine\Str` object directly.

```php
$string = new Twine\Str('john pinkerton');
```

> [!IMPORTANT]
> When passing a non-string value to `Twine\Str`, it will be cast to a string internally.

You may also instantiate a `Twine\Str` object statically via the `make()` method.

```php
$string = Twine\Str::make('john pinkerton');
```

Twine also ships with a global `str()` helper that returns a `Twine\Str` object:

```php
$string = str('john pinkerton');
```

## Using the `Str` object

Once you have a concrete `Twine\Str` instance, you may treat it like any other
string in many situations.

```php
echo $string; // Echos 'john pinkerton'

str_shuffle($string); // Returns something like 'enoipo ktnjhnr'

strlen($string); // Returns 14
```

Keep in mind that a `Twine\Str` object is not a string primitive.

```php
is_string($string); // Returns false

$string === 'john pinkerton'; // Returns false
```

At this point, you're ready to start using Twine methods.

```php
$string->substring(5, 4); // Returns 'pink'

$string->uppercaseWords(); // Returns 'John Pinkerton'

$string->words(); // Returns ['john', 'pinkerton']
```

## Method Chaining

A Twine string can be manipulated fluently by chaining methods.

### Perform a substring comparison

```php
$string = new Twine\Str('john pinkerton');

$string->substring(5, 4)->equals('pink'); // Returns true
```

### Transform and manipulate a string

```php
$string = Twine\Str::make('john pinkerton');

$string->prepend('mr. ')->uppercaseWords(); // Returns 'Mr. John Pinkerton'
```

### Encode a file in compliance with [RFC 2045](https://www.rfc-editor.org/rfc/rfc2045)

```php
$string = new Twine\Str(file_get_contents('garbage.bin'));

$string->base64()->wrap(76, "\r\n", Twine\Config\Wrap::HARD);
```

## Usage Tips

When using the static `make()` method or the `str()` helper, you can chain
methods immediately in a single line.

```php
Twine\Str::make('john pinkerton')->uppercaseWords();
```

```php
str('john pinkerton')->uppercaseWords();
```
