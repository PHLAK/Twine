<p align="center">
  <img src="twine.png" alt="Twine" width="50%">
</p>

<p align="center">
  <a href="https://packagist.org/packages/PHLAK/Twine"><img src="https://img.shields.io/packagist/v/PHLAK/Twine.svg" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/PHLAK/Twine"><img src="https://img.shields.io/packagist/dt/PHLAK/Twine.svg" alt="Total Downloads"></a>
  <a href="https://www.ChrisKankiewicz.com"><img src="https://img.shields.io/badge/author-Chris%20Kankiewicz-blue.svg" alt="Author"></a>
  <a href="https://packagist.org/packages/PHLAK/Twine"><img src="https://img.shields.io/packagist/l/PHLAK/Twine.svg" alt="License"></a>
  <a href="https://travis-ci.org/PHLAK/Twine"><img src="https://img.shields.io/travis/PHLAK/Twine.svg" alt="Build Status"></a>
  <a href="https://styleci.io/repos/95623990"><img src="https://styleci.io/repos/95623990/shield?branch=master&style=flat" alt="StyleCI"></a>
</p>

<p align="center">
   String manipulation, leveled up! -- by, <a href="https://www.ChrisKankiewicz.com">Chris Kankiewicz</a> (<a href="https://twitter.com/PHLAK">@PHLAK</a>)
</p>

Introduction
------------

Twine is a simple string manipulation library with an expressive, fluent syntax.

#### Like this project?

[![Join the community on Spectrum](https://img.shields.io/badge/Join_the_community-PHLAKNET-7a15fe.svg)](https://spectrum.chat/phlaknet)
[![Become a Patron](https://img.shields.io/badge/Become_a-Patron-f96854.svg)](https://patreon.com/PHLAK)
[![One-time Donation](https://img.shields.io/badge/Make_a-Donation-006bb6.svg)](https://paypal.me/ChrisKankiewicz)

Requirements
------------

  - [PHP](https://php.net) >= 7.2

Install with Composer
---------------------

```bash
composer require phlak/twine
```

Getting Started
----------------

First, import Twine:

```php
use PHLAK\Twine;
```

Then instantiate a Twine object by newing up a `Twine\Str` object and passing
your string as the first parameter.

```php
$string = new Twine\Str('john pinkerton');
```

You may also instantiate a `Twine\Str` object statically via the `make()` method.

```php
$string = Twine\Str::make('john pinkerton');
```

Or use the global `str()` helper method. The method takes a string as the only
parameter and returns a `Twine\Str` object.

```php
$string = str('john pinkerton');
```

Once you have a concrete `Twine\Str` instance you may treat it like any other
string. This includes echoing it or using any of PHP's built in string functions
against it.

```php
echo $string; // Echos 'john pinkerton'

str_shuffle($string) // Returns something like 'enoipo ktnjhnr'

strlen($string); // Returns 14
```

At this point you're ready to start using Twine by calling any of its many
built in methods.

Available Methods
-----------------

[after](https://twine.phlak.net/docs/methods/after) •
[append](https://twine.phlak.net/docs/methods/append) •
[base64](https://twine.phlak.net/docs/methods/base64) •
[base64Decode](https://twine.phlak.net/docs/methods/base64decode) •
[base64Encode](https://twine.phlak.net/docs/methods/base64encode) •
[bcrypt](https://twine.phlak.net/docs/methods/bcrypt) •
[before](https://twine.phlak.net/docs/methods/before) •
[camelCase](https://twine.phlak.net/docs/methods/camelcase) •
[characters](https://twine.phlak.net/docs/methods/characters) •
[chunk](https://twine.phlak.net/docs/methods/chunk) •
[contains](https://twine.phlak.net/docs/methods/contains) •
[count](https://twine.phlak.net/docs/methods/count) •
[crc32](https://twine.phlak.net/docs/methods/crc32) •
[crypt](https://twine.phlak.net/docs/methods/crypt) •
[decrypt](https://twine.phlak.net/docs/methods/decrypt) •
[echo](https://twine.phlak.net/docs/methods/echo) •
[encoding](https://twine.phlak.net/docs/methods/encoding) •
[encrypt](https://twine.phlak.net/docs/methods/encrypt) •
[endsWith](https://twine.phlak.net/docs/methods/endswith) •
[equals](https://twine.phlak.net/docs/methods/equals) •
[explode](https://twine.phlak.net/docs/methods/explode) •
[first](https://twine.phlak.net/docs/methods/first) •
[format](https://twine.phlak.net/docs/methods/format) •
[from](https://twine.phlak.net/docs/methods/from) •
[hex](https://twine.phlak.net/docs/methods/hex) •
[hexEncode](https://twine.phlak.net/docs/methods/hexencode) •
[hexDecode](https://twine.phlak.net/docs/methods/hexdecode) •
[insensitiveMatch](https://twine.phlak.net/docs/methods/insensitivematch) •
[insert](https://twine.phlak.net/docs/methods/insert) •
[in](https://twine.phlak.net/docs/methods/in) •
[isAlphabetic](https://twine.phlak.net/docs/methods/isalphabetic) •
[isAlphanumeric](https://twine.phlak.net/docs/methods/isalphanumeric) •
[isEmpty](https://twine.phlak.net/docs/methods/isempty) •
[isLowercase](https://twine.phlak.net/docs/methods/islowercase) •
[isNotEmpty](https://twine.phlak.net/docs/methods/isnotempty) •
[isNumeric](https://twine.phlak.net/docs/methods/isnumeric) •
[isPrintable](https://twine.phlak.net/docs/methods/isprintable) •
[isPunctuation](https://twine.phlak.net/docs/methods/ispunctuation) •
[isUppercase](https://twine.phlak.net/docs/methods/isuppercase) •
[isWhitespace](https://twine.phlak.net/docs/methods/iswhitespace) •
[join](https://twine.phlak.net/docs/methods/join) •
[kebabCase](https://twine.phlak.net/docs/methods/kebabcase) •
[last](https://twine.phlak.net/docs/methods/last) •
[length](https://twine.phlak.net/docs/methods/length) •
[lowercase](https://twine.phlak.net/docs/methods/lowercase) •
[lowercaseFirst](https://twine.phlak.net/docs/methods/lowercasefirst) •
[lowercaseWords](https://twine.phlak.net/docs/methods/lowercasewords) •
[matches](https://twine.phlak.net/docs/methods/matches) •
[md5](https://twine.phlak.net/docs/methods/md5) •
[nth](https://twine.phlak.net/docs/methods/nth) •
[pad](https://twine.phlak.net/docs/methods/pad) •
[padBoth](https://twine.phlak.net/docs/methods/padboth) •
[padLeft](https://twine.phlak.net/docs/methods/padleft) •
[padRight](https://twine.phlak.net/docs/methods/padright) •
[pascalCase](https://twine.phlak.net/docs/methods/pascalcase) •
[prepend](https://twine.phlak.net/docs/methods/prepend) •
[repeat](https://twine.phlak.net/docs/methods/repeat) •
[replace](https://twine.phlak.net/docs/methods/replace) •
[reverse](https://twine.phlak.net/docs/methods/reverse) •
[sha1](https://twine.phlak.net/docs/methods/sha1) •
[sha256](https://twine.phlak.net/docs/methods/sha256) •
[shuffle](https://twine.phlak.net/docs/methods/shuffle) •
[similarity](https://twine.phlak.net/docs/methods/similarity) •
[snakeCase](https://twine.phlak.net/docs/methods/snakecase) •
[split](https://twine.phlak.net/docs/methods/split) •
[startsWith](https://twine.phlak.net/docs/methods/startswith) •
[strip](https://twine.phlak.net/docs/methods/strip) •
[studlyCase](https://twine.phlak.net/docs/methods/studlycase) •
[substring](https://twine.phlak.net/docs/methods/substring) •
[to](https://twine.phlak.net/docs/methods/to) •
[trim](https://twine.phlak.net/docs/methods/trim) •
[trimLeft](https://twine.phlak.net/docs/methods/trimleft) •
[trimRight](https://twine.phlak.net/docs/methods/trimright) •
[truncate](https://twine.phlak.net/docs/methods/truncate) •
[uppercase](https://twine.phlak.net/docs/methods/uppercase) •
[uppercaseFirst](https://twine.phlak.net/docs/methods/uppercasefirst) •
[uppercaseWords](https://twine.phlak.net/docs/methods/uppercasewords) •
[url](https://twine.phlak.net/docs/methods/url) •
[words](https://twine.phlak.net/docs/methods/words) •
[wrap](https://twine.phlak.net/docs/methods/wrap) •
[wrapHard](https://twine.phlak.net/docs/methods/wraphard) •
[wrapSoft](https://twine.phlak.net/docs/methods/wrapsoft)

---

Method Chaining
---------------

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

Additional details available in the full documentation at <https://twine.phlak.net>.

Changelog
---------

A list of changes can be found on the [GitHub Releases](https://github.com/PHLAK/Twine/releases) page.

Troubleshooting
---------------

For general help and support join our [Spectrum community](https://spectrum.chat/phlaknet).

Please report bugs to the [GitHub Issue Tracker](https://github.com/PHLAK/Twine/issues).

Copyright
---------

This project is licensed under the [MIT License](https://github.com/PHLAK/Twine/blob/master/LICENSE).
