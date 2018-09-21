Twine
=====

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

Getting Started
----------------

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

More details available at <https://twine.phlak.net/docs/usage/>

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
[contains](https://twine.phlak.net/docs/methods/contains) •
[count](https://twine.phlak.net/docs/methods/count) •
[crc32](https://twine.phlak.net/docs/methods/crc32) •
[crypt](https://twine.phlak.net/docs/methods/crypt) •
[decrypt](https://twine.phlak.net/docs/methods/decrypt) •
[echo](https://twine.phlak.net/docs/methods/echo) •
[encrypt](https://twine.phlak.net/docs/methods/encrypt) •
[endsWith](https://twine.phlak.net/docs/methods/endswith) •
[equals](https://twine.phlak.net/docs/methods/equals) •
[first](https://twine.phlak.net/docs/methods/first) •
[format](https://twine.phlak.net/docs/methods/format) •
[from](https://twine.phlak.net/docs/methods/from) •
[hex](https://twine.phlak.net/docs/methods/hex) •
[hexEncode](https://twine.phlak.net/docs/methods/hexencode) •
[hexDecode](https://twine.phlak.net/docs/methods/hexdecode) •
[insensitiveMatch](https://twine.phlak.net/docs/methods/insensitivematch) •
[insert](https://twine.phlak.net/docs/methods/insert) •
[join](https://twine.phlak.net/docs/methods/join) •
[kebabCase](https://twine.phlak.net/docs/methods/kebabcase) •
[last](https://twine.phlak.net/docs/methods/last) •
[length](https://twine.phlak.net/docs/methods/length) •
[lowercase](https://twine.phlak.net/docs/methods/lowercase) •
[matches](https://twine.phlak.net/docs/methods/matches) •
[md5](https://twine.phlak.net/docs/methods/md5) •
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
[startsWith](https://twine.phlak.net/docs/methods/startswith) •
[strip](https://twine.phlak.net/docs/methods/strip) •
[studlyCase](https://twine.phlak.net/docs/methods/studlycase) •
[substring](https://twine.phlak.net/docs/methods/substring) •
[trim](https://twine.phlak.net/docs/methods/trim) •
[trimLeft](https://twine.phlak.net/docs/methods/trimleft) •
[trimRight](https://twine.phlak.net/docs/methods/trimright) •
[truncate](https://twine.phlak.net/docs/methods/truncate) •
[uppercase](https://twine.phlak.net/docs/methods/uppercase) •
[url](https://twine.phlak.net/docs/methods/url) •
[words](https://twine.phlak.net/docs/methods/words) •
[wrap](https://twine.phlak.net/docs/methods/wrap) •
[wrapHard](https://twine.phlak.net/docs/methods/wraphard) •
[wrapSoft](https://twine.phlak.net/docs/methods/wrapsoft)

Full documentation available at <https://twine.phlak.net>

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

Changelog
---------

A list of changes can be found on the [GitHub Releases](https://github.com/PHLAK/Twine/releases) page.

Troubleshooting
---------------

Please report bugs to the [GitHub Issue Tracker](https://github.com/PHLAK/Twine/issues).

Copyright
---------

This project is licensed under the [MIT License](https://github.com/PHLAK/Twine/blob/master/LICENSE).
