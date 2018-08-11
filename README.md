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

  - [PHP](https://php.net) >= 7.0

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
$string = new Twine\Str('john pinkerton');

// or statically via the make() method

$string = Twine\Str::make('john pinkerton');

// or with the str() helper method

$string = str('john pinkerton');
```

Usage
-----

#### Available Methods

[substr](#substr) - Return part of the string.\
[before](#before) - Return part of the string occurring before a specific string.\
[after](#after) - Return part of the string occurring after a specific string.\
[truncate](#truncate) - Truncate a string to a specific length and append a suffix.\
[words](#words) - Split the string into an array of words.\
[append](#append) - Append one or more strings to the string.\
[prepend](#prepend) - Prepend one or more strings to the string.\
[join](#join) - Join two strings with another string in between.\
[insert](#insert) - Insert some text into the string at a given position.\
[uppercase](#uppercase) - Convert all or parts of the string to uppercase.\
[lowercase](#lowercase) - Convert all or parts of the string to lowercase.\
[reverse](#reverse) - Reverse the string.\
[repeat](#repeat) - Repeat the string multiple times.\
[replace](#replace) - Replace parts of the string with another string.\
[shuffle](#shuffle) - Randomly shuffle the characters of the string.\
[pad](#pad) - Pad the string to a specific length.\
[trim](#trim) - Remove white space or a specific set of characters from the beginning and/or end of the string.\
[urlencode](#urlencode) - Encode the string to a URL safe string.\
[hex](#hex) - Encode and decode the string to and from hex.\
[wrap](#wrap) - Wrap the string to a given number of characters.\
[equals](#equals) - Determine if the string is equal to another string.\
[startsWith](#startswith) - Determine if the string starts with another string.\
[endsWith](#endswith) - Determine if the string ends with another string.\
[contains](#contains) - Determine if the string contains another string.\
[similarity](#similarity) - Calculate the similarity percentage between two strings.\
[base64](#base64) - Encode the string to or decode from a base64 encoded value.\
[count](#count) - Count the number of occurrences of a substring in the string.\
[format](#format) - Return the formatted string\
[length](#length) - Get the length of the string.\
[crc32](#crc32) - Calculate the crc32 polynomial of the string.\
[crypt](#crypt) - Hash the string using the standard Unix DES-based algorithm or an alternative algorithm that may be available on the system.\
[md5](#md5) - Calculate the md5 hash of the string.\
[sha1](#sha1) - Calculate the sha1 hash of the string.\
[sha256](#sha256) - Calculate the sha256 hash of the string.\
[bcrypt](#bcrypt) - Creates a hash from the string using the CRYPT_BLOWFISH algorithm.\
[encrypt](#encrypt) - Encrypt the string.\
[decrypt](#decrypt) - Decrypt the string.\
[camelCase](#camelcase) - Convert the string to camelCase.\
[studlyCase](#studlycase) - Convert the string to studlyCase.\
[pascalCase](#pascalcase) - Convert the string to pascalCase.\
[snakeCase](#snakecase) - Convert the string to snakeCase.\
[kebabCase](#kebabcase) - Convert the string to kebabCase.

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
$string = new Twine\Str('john pinkerton');

$string->substring(5, 4); // Returns 'pink'
```

#### Aliases

| Alias                      | For                             |
| -------------------------- | ------------------------------- |
| `Twine\Str::first($count)` | `$string->substring(0, $count)` |
| `Twine\Str::last($count)`  | `$string->substring(-$count)`   |

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

$string->after(' '); // Returns 'pinkerton'
```

---

### truncate
> Truncate a string to a specific length and append a suffix.

```php
Twine\Str::truncate( int $length [, string $suffix = '...' ] ) : Twine\Str
```

| Parameter | Description                                          |
| --------- | ---------------------------------------------------- |
| `$length` | Length string will be truncated to, including suffix |
| `$suffix` | Suffix to append (default: '...')                    |

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->truncate(12); // Returns 'john pink...'
$string->truncate(10, '~'); // Returns 'john pink~'
$string->truncate(8); // Returns 'john...'
```

---

### words
> Split the string into an array of words.

```php
Twine\Str::words( void ) : array
```

#### Examples

```php
$string = new Twine\Str('john pinkerton');

$string->words(); // Returns ['john', 'pinkerton']
```

```php
$string = new Twine\Str('johnPinkerton');

$string->words(); // Returns ['john', 'Pinkerton']
```

```php
$string = new Twine\Str('JohnPinkerton');

$string->words(); // Returns ['John', 'Pinkerton']
```

```php
$string = new Twine\Str('john_pinkerton');

$string->words(); // Returns ['john', 'pinkerton']
```

```php
$string = new Twine\Str('john-pinkerton');

$string->words(); // Returns ['john', 'pinkerton']
```

```php
$string = new Twine\Str("john\npinkerton");

$string->words(); // Returns ['john', 'pinkerton']
```

---

### append
> Append one or more strings to the string.

```php
Twine\Str::append( string $suffix ) : Twine\Str
```

| Parameter | Description        |
| --------- | ------------------ |
| `$suffix` | A string to append |

#### Examples

```php
$string = new Twine\Str('john pinkerton');

$string->append(' jr'); // Returns 'john pinkerton jr'
```

```php
$first = new Twine\Str('john');
$last = new Twine\Str('pinkerton');

$first->append(' ', $last, ' ', 'jr'); // Returns 'john pinkerton jr'
```


---

### prepend
> Prepend one or more strings to the string.

```php
Twine\Str::prepend( string ...$strings ) : Twine\Str
```

| Parameter     | Description                   |
| ------------- | ----------------------------- |
| `...$strings` | One or more strings to append |

#### Examples

```php
$string = new Twine\Str('john pinkerton');

$string->prepend('mr '); // Returns 'mr john pinkerton'
```

```php
$first = new Twine\Str('john');
$last = new Twine\Str('pinkerton');

$last->prepend('mr', ' ', $first); // Returns 'mr john pinkerton'
```

---

### join
> Join two strings with another string in between.

```php
Twine\Str::join( string $string [, string $glue = ' ' ] ) : Twine\Str
```

| Parameter | Description                 |
| --------- | --------------------------- |
| `$string` | The string to be joined     |
| `$glue`   | A string to use as the glue |

#### Example

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

$string->pad(20, '_');  // Returns 'john pinkerton______'
$string->pad(20, '_', Twine\Config\Pad::LEFT); // Returns '______john pinkerton'
$string->pad(20, '_', Twine\Config\Pad::BOTH); // Returns '___john pinkerton___'
```

#### Aliases

| Alias                    | For                                      |
| ------------------------ | ---------------------------------------- |
| `Twine\Str::padRight($length, $padding)`  | `$string->pad($length, $padding, Twine\Config\Pad::RIGHT)` |
| `Twine\Str::padLeft($length, $padding)`   | `$string->pad($length, $padding, Twine\Config\Pad::LEFT)`  |
| `Twine\Str::padBoth($length, $padding)`   | `$string->pad($length, $padding, Twine\Config\Pad::BOTH)`  |

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

### urlencode
> Encode the string to a URL safe string.

```php
Twine\Str::urlencode( void ) : Twine\Str
```

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->urlencode(); // Returns 'john+pinkerton'
```

---

### hex
> Encode and decode the string to and from hex.

```php
Twine\Str::hex( [ string $mode = Config\Hex::ENCODE ] ) : Twine\Str
```

| Parameter | Description     |
| --------- | --------------- |
| `$mode`   | A hex mode flag |

Available hex modes:

  - `Twine\Config\Hex::ENCODE` - Encode the string to hex
  - `Twine\Config\Hex::DECODE` - Decode the string from hex

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->hex(); // Returns '\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e'
```

```php
$string = new Twine\Str('\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e');

$string->hex(Twine\Config\Hex::DECODE); // Returns 'john pinkerton'
```

#### Aliases

| Alias                    | For                                      |
| ------------------------ | ---------------------------------------- |
| `Twine\Str::hexEncode()` | `$string->hex(Twine\Config\Hex::ENCODE)` |
| `Twine\Str::hexDecode()` | `$string->hex(Twine\Config\Hex::DECODE)` |


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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

$string->contains('pink'); // Returns true
$string->contains('purple'); // Returns false
```

---

### similarity
> Calculate the similarity percentage between two strings.

```php
Twine\Str::similarity( string $string ) : float
```

| Parameter | Description                   |
| --------- | ----------------------------- |
| `$string` | The string to compare against |

#### Examples

```php
$string = new Twine\Str('john pinkerton');

$string->similarity('jim ponkerten'); // Returns 66.666666666667
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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

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
$string = new Twine\Str('john pinkerton');

$string->crypt('NaCl'); // Returns 'Naq9mOMsN7Yac'
```

---

### md5
> Calculate the md5 hash of the string.

```php
Twine\Str::md5( [ bool $mode = Twine\Config\Md5::DEFAULT ] ) : Twine\Str
```

| Parameter | Description     |
| --------- | --------------- |
| `$mode`   | A md5 mode flag |

Available md5 modes:

  - `Twine\Config\Md5::DEFAULT` - Return the hash
  - `Twine\Config\Md5::RAW` - Return the raw binary of the hash

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->md5(); // Returns '30cac4703a16a2201ec5cafbd600d803'
```

---

### sha1
> Calculate the sha1 hash of the string.

```php
Twine\Str::sha1( [ bool $mode = Twine\Config\Sha1::DEFAULT ] ) : Twine\Str
```

| Parameter | Description      |
| --------- | ---------------- |
| `$mode`   | A sha1 mode flag |

Available sha1 mode flags:

  - `Twine\Config\Sha1::DEFAULT` - Return the hash
  - `Twine\Config\Sha1::RAW` - Return the raw binary of the hash

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->sha1(); // Returns 'fcaf28c7705ba8f267472bb5aa8ad883f6bf0427'
```

---

### sha256
> Calculate the sha256 hash of the string.

```php
Twine\Str::sha256( [ bool $mode = Twine\Config\Sha256::DEFAULT ] ) : Twine\Str
```

| Parameter | Description        |
| --------- | ------------------ |
| `$mode`   | A sha256 mode flag |

Available sha256 mode flags:

  - `Twine\Config\Sha256::DEFAULT` - Return the hash
  - `Twine\Config\Sha256::RAW` - Return the raw binary of the hash

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->sha256(); // Returns '7434f26c8c2fc83e57347feb2dfb235c2f47b149b54b80692beca9d565159dfd'
```

---

### bcrypt
> Creates a hash from the string using the CRYPT_BLOWFISH algorithm.

```php
Twine\Str::bcrypt( [ array $options = [] ] ) : Twine\Str
```

| Parameter  | Description                       |
| ---------- | --------------------------------- |
| `$options` | An array of bcrypt hasing options |

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->bcrypt(['salt' => 'NaClNaClNaClNaClNaClNaCl']); // Returns '$2y$10$NaClNaClNaClNaClNaClNOMtb0r8BE2WGaLqvGur17DqtgjsWl0lW'
```

---

### encrypt
> Encrypt the string.

```php
Twine\Str::encrypt( string $key, [ string $cipher = 'AES-128-CBC' ] ) : Twine\Str
```

| Parameter | Description            |
| --------- | ---------------------- |
| `$key`    | The key for encrypting |
| `$cipher` | The cipher method      |

Supported cipher methods:

  - `AES-128-CBC` (default)
  - `AES-256-CBC`

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->encrypt('secret'); // Returns something like '$DZpEm9ZFec9ybxF7$y2rc62EapV8p+xOKGaQHKA==$pKe7S3T7tf8jaXWpUHc='
```

---

### decrypt
> Decrypt the string.

```php
Twine\Str::decrypt( string $key, [ string $cipher = 'AES-128-CBC' ] ) : Twine\Str
```

| Parameter | Description            |
| --------- | ---------------------- |
| `$key`    | The key for decrypting |
| `$cipher` | The cipher method      |

Supported cipher methods:

  - `AES-128-CBC` (default)
  - `AES-256-CBC`

#### Example

```php
$string = new Twine\Str('$DZpEm9ZFec9ybxF7$y2rc62EapV8p+xOKGaQHKA==$pKe7S3T7tf8jaXWpUHc=');

$string->decrypt('secret'); // Returns 'john pinkerton'
```

---

### camelCase
> Convert the string to camelCase.

```php
Twine\Str::camelCase( void ) : Twine\Str
```

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->camelCase(); // Returns 'johnPinkerton'
```

---

### studlyCase
> Convert the string to studlyCase.

```php
Twine\Str::studlyCase( void ) : Twine\Str
```

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->studlyCase(); // Returns 'JohnPinkerton'
```

---

### pascalCase
> Convert the string to pascalCase.

```php
Twine\Str::pascalCase( void ) : Twine\Str
```

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->pascalCase(); // Returns 'JohnPinkerton'
```

---

### snakeCase
> Convert the string to snakeCase.

```php
Twine\Str::snakeCase( void ) : Twine\Str
```

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->snakeCase(); // Returns 'john_pinkerton'
```

---

### kebabCase
> Convert the string to kebabCase.

```php
Twine\Str::kebabCase( void ) : Twine\Str
```

#### Example

```php
$string = new Twine\Str('john pinkerton');

$string->kebabCase(); // Returns 'john-pinkerton'
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
