Twine
=========

![Twine](twine.png)

-----

[![Latest Stable Version](https://img.shields.io/packagist/v/PHLAK/Twine.svg)](https://packagist.org/packages/PHLAK/Twine)
[![Total Downloads](https://img.shields.io/packagist/dt/PHLAK/Twine.svg)](https://packagist.org/packages/PHLAK/Twine)
[![Author](https://img.shields.io/badge/author-Chris%20Kankiewicz-blue.svg)](https://www.ChrisKankiewicz.com)
[![License](https://img.shields.io/packagist/l/PHLAK/Twine.svg)](https://packagist.org/packages/PHLAK/Twine)
[![Build Status](https://img.shields.io/travis/PHLAK/Twine.svg)](https://travis-ci.org/PHLAK/Twine)
[![StyleCI](https://styleci.io/repos/95623990/shield?branch=master&style=flat)](https://styleci.io/repos/95623990)

String manipulation, leveled up! -- by, [Chris Kankiewicz](https://www.ChrisKankiewicz.com) ([@PHLAK](https://twitter.com/PHLAK))

Introduction
------------

Twine is a simple string manipulation library with an expressive, fluent syntax.

[![Twine Demo](demo.gif)](https://asciinema.org/a/190362)

Like this project? Keep me caffeinated by [making a donation](https://paypal.me/ChrisKankiewicz).

Requirements
------------

  - [PHP](https://php.net) >= 5.6

Install with Composer
---------------------

```bash
composer require phlak/twine
```

Initializing Twine
------------------

First, import Twine:

```php
use PHLAK\Twine;
```

Then instantiate a Twine string:

```php
$string = Twine\Str('john pinkerton');
```

Usage
-----

### substr
> Return part of the string.

```php
Twine\Str::substring( int $start [, int $length = null ] ) : Twine\Str
```

| Parameter | Description                        |
| --------- | ---------------------------------- |
| `$start`  | Starting position of the substring |
| `$length` | Length of substring                |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->substring(5, 4); // Returns 'pink'
```

---

### before
> Return part of the string occurring before a specific string.

```php
Twine\Str::before( string $string ) : Twine\Str
```

| Parameter | Description           |
| --------- | --------------------- |
| `$string` | The delimiting string |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->before(' '); // Returns 'john'
```

---

### after
> Return part of the string occurring after a specific string.

```php
Twine\Str::after( string $string ) : Twine\Str
```

| Parameter | Description           |
| --------- | --------------------- |
| `$string` | The delimiting string |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->after(' '); // Returns 'pinkerton'
```

---

### append
> Append a suffix to the string.

```php
Twine\Str::append( string $suffix ) : Twine\Str
```

| Parameter | Description        |
| --------- | ------------------ |
| `$suffix` | A string to append |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->append(' jr'); // Returns 'john pinkerton jr'
```

---

### prepend
> Prepend the string with a prefix.

```php
Twine\Str::prepend( string $prefix );
```

| Parameter | Description         |
| --------- | ------------------- |
| `$prefix` | A string to prepend |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->prepend('mr '); // Returns 'mr john pinkerton'
```

---

### insert
> Insert some text into the string at a given position.

```php
Twine\Str::insert( string $string , int $position ) : Twine\Str
```

| Parameter   | Description                          |
| ----------- | ------------------------------------ |
| `$string`   | Text to insert                       |
| `$position` | Position at which to insert the text |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->insert('athan', 4); // Returns 'johnathan pinkerton'
```

---

### uppercase
> Convert all or parts of the string to uppercase.

```php
Twine\Str::uppercase( [ string $mode = Twine\Config\Uppercase::ALL ] ) : Twine\Str
```

| Parameter | Description            |
| --------- | ---------------------- |
| `$mode`   | An uppercase mode flag |

Available uppercase modes:

  - `Twine\Config\Uppercase::ALL` - Uppercase all characters of the string
  - `Twine\Config\Uppercase::FIRST` - Uppercase the first character of the string
  - `Twine\Config\Uppercase::WORDS` - Uppercase the first character of each word of the string

#### Examples

```php
$string = Twine\Str('john pinkerton');

$string->uppercase(); // Returns 'JOHN PINKERTON'
$string->uppercase(Twine\Config\Uppercase::FIRST); // Returns 'John pinkerton'
$string->uppercase(Twine\Config\Uppercase::WORDS); // Returns 'John Pinkerton'
```

#### Aliases

| Alias                         | For                                                 |
| ----------------------------- | --------------------------------------------------- |
| `Twine\Str::uppercaseFirst()` | `$string->uppercase(Twine\Config\Uppercase::FIRST)` |
| `Twine\Str::uppercaseWords()` | `$string->uppercase(Twine\Config\Uppercase::WORDS)` |

---

### lowercase
> Convert all or parts of the string to lowercase.

```php
Twine\Str::lowercase( [ string $mode = Twine\Config\Lowercase::ALL ] ) : Twine\Str
```

| Parameter | Description           |
| --------- | --------------------- |
| `$mode`   | A lowercase mode flag |

Available lowercase modes:

  - `Twine\Config\Lowercase::ALL` - Lowercase all characters of the string
  - `Twine\Config\Lowercase::FIRST` - Lowercase the first character of the string
  - `Twine\Config\Lowercase::WORDS` - Lowercase the first character of each word of the string

#### Examples

```php
$string = new Twine\Str('JOHN PINKERTON');

$string->lowercase(); // Returns 'john pinkerton'
$string->lowercase($mode = Twine\Config\Lowercase::FIRST); // Returns 'jOHN PINKERTON'
$string->lowercase($mode = Twine\Config\Lowercase::WORDS); // Returns 'jOHN pINKERTON'
```

#### Aliases

| Alias                         | For                                                 |
| ----------------------------- | --------------------------------------------------- |
| `Twine\Str::lowercaseFirst()` | `$string->lowercase(Twine\Config\Lowercase::FIRST)` |
| `Twine\Str::lowercaseWords()` | `$string->lowercase(Twine\Config\Lowercase::WORDS)` |


---

### reverse
> Reverse the string.

```php
Twine\Str::reverse( void ) : Twine\Str
```

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->reverse(); // Returns 'notreknip nhoj'
```

---

### repeat
> Repeat the string multiple times.

```php
Twine\Str::repeat( int $multiplier ) : Twine\Str
```

| Parameter     | Description                          |
| ---------     | ------------------------------------ |
| `$multiplier` | Number of times to repeat the string |

#### Example

```php
$string = Twine\Str('beetlejuice');

$string->repeat(3); // Returns 'beetlejuicebeetlejuicebeetlejuice'
```

---

### replace
> Replace parts of the string with another string.

```php
Twine\Str::replace( string $search , string $replace [, int &$count = null ] ) : Twine\Str
```

| Parameter  | Description                                              |
| ---------- | -------------------------------------------------------- |
| `$search`  | The value to be replaced                                 |
| `$replace` | The value to replace with                                |
| `&$count`  | This will be set to the number of replacements performed |

#### Examples

```php
$string = Twine\Str('john pinkerton');

$string->replace('john', 'bob'); // Returns 'bob pinkerton'
$string->replace('n', 'x', $count); // Returns 'johx pixkertox' and $count will be 3
```

---

### shuffle
> Randomly shuffle the characters of the string.

```php
Twine\Str::shuffle( void ) : Twine\Str
```

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->shuffle(); // Returns something like 'jnphin erkotno'
```

---

### pad
> Pad the string to a specific length.

```php
Twine\Str::pad( int $length [, string $padding = ' ' [, int $mode = Twine\Config\Pad::RIGHT ]] ) : Twine\Str
```

| Parameter  | Description                      |
| ---------- | -------------------------------- |
| `$length`  | Length to pad the string to      |
| `$padding` | Character to pad the string with |
| `$mode`    | A pad mode flag                  |

Available pad modes:

  - `Twine\Config\Pad::RIGHT` - Only pad the right side of the string
  - `Twine\Config\Pad::LEFT` - Only pad the left side of the string
  - `Twine\Config\Pad::BOTH` - Pad both sides of the string

#### Examples

```php
$string = Twine\Str('john pinkerton');

$string->pad(20, '_');  // Returns 'john pinkerton______'
$string->pad(20, '_', Twine\Config\Pad::LEFT); // Returns '______john pinkerton'
$string->pad(20, '_', Twine\Config\Pad::BOTH); // Returns '___john pinkerton___'
```

#### Aliases

| Alias                    | For                                      |
| ------------------------ | ---------------------------------------- |
| `Twine\Str::padRight($length, $padding)`  | `$string->trim($length, $padding, Twine\Config\Pad::RIGHT)` |
| `Twine\Str::padLeft($length, $padding)`   | `$string->trim($length, $padding, Twine\Config\Pad::LEFT)`  |
| `Twine\Str::padBoth($length, $padding)`   | `$string->trim($length, $padding, Twine\Config\Pad::BOTH)`  |

---

### trim
> Remove white space or a specific set of characters from the beginning and/or end of the string.

```php
Twine\Str::trim( [ string $mask = " \t\n\r\0\x0B" [, string $mode = Config\Trim::BOTH ]] ) : Twine\Str
```

| Parameter | Description                         |
| --------- | ----------------------------------- |
| `$mask`   | A list of characters to be stripped |
| `$mode`   | A trim mode flag                    |

Available trim modes:

  - `Twine\Config\Trim::BOTH` - Trim characters from the beginning and end of the string
  - `Twine\Config\Trim::LEFT` - Only trim characters from the beginning of the string
  - `Twine\Config\Trim::RIGHT` - Only trim characters from the end of the string

#### Examples

```php
$string = new Twine\Str('   john pinkerton     ');

$string->trim(); // Returns 'john pinkerton'
$string->trim(Twine\Config\Trim::LEFT); // Returns 'john pinkerton     '
$string->trim(Twine\Config\Trim::RIGHT); // Returns '   john pinkerton'
```

```php
$string = new Twine\Str('john pinkerton');

$string->trim('jton'); // Returns 'hn pinker'
```

#### Aliases

| Alias                    | For                                       |
| ------------------------ | ----------------------------------------- |
| `Twine\Str::trimLeft()`  | `$string->trim(Twine\Config\Trim::LEFT)`  |
| `Twine\Str::trimRight()` | `$string->trim(Twine\Config\Trim::RIGHT)` |

---

### wrap
> Wrap the string to a given number of characters.

```php
Twine\Str::wrap( int $width [, $break = "\n" [, bool $mode = Twine\Config\Wrap::SOFT ]] ) : Twine\Str
```

| Parameter | Description                           |
| --------- | ------------------------------------- |
| `$width`  | Number of characters at which to wrap |
| `$break`  | Character used to break the string    |
| `$mode`   | A wrap mode flag                      |

Available wrap modes:

- `Twine\Config\Wrap::SOFT` - Wrap after the specified width
- `Twine\Config\Wrap::HARD` - Always wrap at or before the specified width

#### Examples

```php
$string = Twine\Str('john pinkerton');

$string->wrap(5); // Returns "john\npinkerton"
$string->wrap(5, "\n", Twine\Config\Wrap::HARD); // Returns "john\npinke\nrton"
```

#### Aliases

| Alias                                 | For                                                       |
| ------------------------------------- | --------------------------------------------------------- |
| `Twine\Str::wrapSoft($width, $break)` | `$string->wrap($width, $break, Twine\Config\Trim::LEFT)`  |
| `Twine\Str::wrapHard($width, $break)` | `$string->wrap($width, $break, Twine\Config\Trim::RIGHT)` |

---

### equals
> Determine if the string is equal to another string.

```php
Twine\Str::equals( string $string [, string $mode = Twine\Config\Equals::CASE_SENSITIVE ] ) : bool
```

| Parameter | Description                   |
| --------- | ----------------------------- |
| `$string` | The string to compare against |
| `$mode`   | An equals mode flag           |

Available equals modes:

  - `Twine\Config\Equals::CASE_SENSITIVE` - Match the string with case sensitivity (default)
  - `Twine\Config\Equals::CASE_INSENSITIVE` - Match the string with case insensitivity

#### Examples

```php
$string = Twine\Str('john pinkerton');

$string->equals('john pinkerton'); // Returns true
$string->equals('JoHN PiNKeRToN'); // Returns false
$string->equals('JoHN PiNKeRToN', Twine\Config\Equals::CASE_INSENSITIVE); // Returns true
$string->equals('BoB BeLCHeR', Twine\Config\Equals::CASE_INSENSITIVE); // Returns false
```

#### Aliases

| Alias                                 | For                                                                |
| ------------------------------------- | ------------------------------------------------------------------ |
| `Twine\Str::insensitiveMatch($string)` | `$string->equals($string, Twine\Config\Equals::CASE_INSENSITIVE)` |

---

### startsWith
> Determine if the string starts with another string.

```php
Twine\Str::startsWith( string $string ) : bool
```

| Parameter | Description                   |
| --------- | ----------------------------- |
| `$string` | The string to compare against |

#### Examples

```php
$string = Twine\Str('john pinkerton');

$string->startsWith('john'); // Returns true
$string->startsWith('pinkerton'); // Returns false
```

---

### endsWith
> Determine if the string ends with another string.

```php
Twine\Str::endsWith( string $string ) : bool
```

| Parameter | Description                   |
| --------- | ----------------------------- |
| `$string` | The string to compare against |

#### Examples

```php
$string = Twine\Str('john pinkerton');

$string->endsWith('pinkerton'); // Returns true
$string->endsWith('john'); // Returns false
```

---

### contains
> Determine if the string contains another string.

```php
Twine\Str::contains( string $string ) : bool
```

| Parameter | Description                   |
| --------- | ----------------------------- |
| `$string` | The string to compare against |

#### Examples

```php
$string = Twine\Str('john pinkerton');

$string->contains('pink'); // Returns true
$string->contains('purple'); // Returns false
```

---

### base64
> Encode the string to or decode from a base64 encoded value.

```php
Twine\Str::base64( [ string $mode = Twine\Config\Base64::ENCODE ] ) : Twine\Str
```

| Parameter | Description        |
| --------- | ------------------ |
| `$mode`   | A base64 mode flag |

#### Examples

```php
$string = new Twine\Str('john pinkerton');

$string->base64(); // Returns 'am9obiBwaW5rZXJ0b24='
```

```php
$string = new Twine\Str('am9obiBwaW5rZXJ0b24=');

$string->base64(Twine\Config\Base64::DECODE); // Returns 'john pinkerton'
```

#### Aliases

| Alias                       | For                                            |
| --------------------------- | ---------------------------------------------- |
| `Twine\Str::base64Encode()` | `$string->base64(Twine\Config\Base64::ENCODE)` |
| `Twine\Str::base64Decode()` | `$string->base64(Twine\Config\Base64::DECODE)` |

---

### count
> Count the number of occurrences of a substring in the string.

```php
Twine\Str::count( string $string ) : int
```

| Parameter | Description            |
| --------- | ---------------------- |
| `$string` | The substring to count |

#### Examples

```php
$string = new Twine\Str('How much wood could a woodchuck chuck if a woodchuck could chuck wood?');

$count = $string->count('wood'); // Returns 4
```

---

### format
> Return the formatted string

```php
Twine\Str::format( mixed ...$args ) : Twine\Str
```

| Parameter | Description                                |
| --------- | ------------------------------------------ |
| `...$args` | Any number of elements to fill the string |

#### Example

```php
$string = new Twine\Str('Hello %s! Welcome to %s, population %b.');

$string->format('John', 'Pinkertown', 1337); // Returns 'Hello John! Welcome to Pinkertown, population 10100111001.'
```

---

### length
> Get the length of the string.

```php
Twine\Str::length( void ) : int
```

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->length(); // Returns 14
```

---

### crc32
> Calculate the crc32 polynomial of the string.

```php
Twine\Str::crc32( void ) : int
```

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->crc32(); // Returns 3367853299
```

---

### crypt
> Hash the string using the standard Unix DES-based algorithm or an
> alternative algorithm that may be available on the system.

```php
Twine\Str::crypt( string $salt ) : Twine\Str
```

| Parameter | Description                          |
| --------- | ------------------------------------ |
| `$salt`   | A salt string to base the hashing on |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->crypt('NaCl'); // Returns 'Naq9mOMsN7Yac'
```

---

### md5
> Calculate the md5 hash of the string.

```php
Twine\Str::md5( [ bool $raw = false ] ) : Twine\Str
```

| Parameter | Description                                 |
| --------- | ------------------------------------------- |
| `$raw`    | If true, returns the raw binary of the hash |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->md5(); // Returns '30cac4703a16a2201ec5cafbd600d803'
```

---

### sha1
> Calculate the sha1 hash of the string.

```php
Twine\Str::sha1( [ bool $raw = false ] ) : Twine\Str
```

| Parameter | Description                                 |
| --------- | ------------------------------------------- |
| `$raw`    | If true, returns the raw binary of the hash |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->sha1(); // Returns 'fcaf28c7705ba8f267472bb5aa8ad883f6bf0427'
```

---

### sha256
> Calculate the sha256 hash of the string.

```php
Twine\Str::sha256( [ bool $raw = false ] ) : Twine\Str
```

| Parameter | Description                                 |
| --------- | ------------------------------------------- |
| `$raw`    | If true, returns the raw binary of the hash |

#### Example

```php
$string = Twine\Str('john pinkerton');

$string->sha1(); // Returns '7434f26c8c2fc83e57347feb2dfb235c2f47b149b54b80692beca9d565159dfd'
```

---

## Chaining Methods

A Twine string can be manipulated fluently by chaining methods. Here are a few
example chains:

Perform a substring comparison:

```php
$string = new Twine\Str('john pinkerton');

$string->substring(5, 4)->equals('pink'); // Returns true
```

Encode a file in compliance with [RFC 2045](https://tools.ietf.org/html/rfc2045).

```php
$string = new Twine\Str(file_get_contents('garbage.bin'));

$string->base64()->wrap(76, "\r\n", Twine\Config\Wrap::HARD);
```

Changelog
---------

A list of changes can be found on the [GitHub Releases](https://github.com/PHLAK/Twine/releases) page.

Troubleshooting
---------------

Please report bugs to the [GitHub Issue Tracker](https://github.com/PHLAK/Twine/issues).

Copyright
---------

This project is licensed under the [MIT License](https://github.com/PHLAK/Twine/blob/master/LICENSE).
