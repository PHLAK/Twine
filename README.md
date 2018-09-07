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

More details available at <https://twine.phlak.net/getting-started/>

Available Methods
-----------------

[after](https://twine.phlak.net/methods/after) •
[append](https://twine.phlak.net/methods/append) •
[base64](https://twine.phlak.net/methods/base64) •
[base64Decode](https://twine.phlak.net/methods/base64decode) •
[base64Encode](https://twine.phlak.net/methods/base64encode) •
[bcrypt](https://twine.phlak.net/methods/bcrypt) •
[before](https://twine.phlak.net/methods/before) •
[camelCase](https://twine.phlak.net/methods/camelcase) •
[contains](https://twine.phlak.net/methods/contains) •
[count](https://twine.phlak.net/methods/count) •
[crc32](https://twine.phlak.net/methods/crc32) •
[crypt](https://twine.phlak.net/methods/crypt) •
[decrypt](https://twine.phlak.net/methods/decrypt) •
[echo](https://twine.phlak.net/methods/echo) •
[encrypt](https://twine.phlak.net/methods/encrypt) •
[endsWith](https://twine.phlak.net/methods/endswith) •
[equals](https://twine.phlak.net/methods/equals) •
[first](https://twine.phlak.net/methods/first) •
[format](https://twine.phlak.net/methods/format) •
[from](https://twine.phlak.net/methods/from) •
[hex](https://twine.phlak.net/methods/hex) •
[hexEncode](https://twine.phlak.net/methods/hexencode) •
[hexDecode](https://twine.phlak.net/methods/hexdecode) •
[insensitiveMatch](https://twine.phlak.net/methods/insensitivematch) •
[insert](https://twine.phlak.net/methods/insert) •
[join](https://twine.phlak.net/methods/join) •
[kebabCase](https://twine.phlak.net/methods/kebabcase) •
[last](https://twine.phlak.net/methods/last) •
[length](https://twine.phlak.net/methods/length) •
[lowercase](https://twine.phlak.net/methods/lowercase) •
[md5](https://twine.phlak.net/methods/md5) •
[pad](https://twine.phlak.net/methods/pad) •
[padBoth](https://twine.phlak.net/methods/padboth) •
[padLeft](https://twine.phlak.net/methods/padleft) •
[padRight](https://twine.phlak.net/methods/padright) •
[pascalCase](https://twine.phlak.net/methods/pascalcase) •
[prepend](https://twine.phlak.net/methods/prepend) •
[repeat](https://twine.phlak.net/methods/repeat) •
[replace](https://twine.phlak.net/methods/replace) •
[reverse](https://twine.phlak.net/methods/reverse) •
[sha1](https://twine.phlak.net/methods/sha1) •
[sha256](https://twine.phlak.net/methods/sha256) •
[shuffle](https://twine.phlak.net/methods/shuffle) •
[similarity](https://twine.phlak.net/methods/similarity) •
[snakeCase](https://twine.phlak.net/methods/snakecase) •
[startsWith](https://twine.phlak.net/methods/startswith) •
[strip](https://twine.phlak.net/methods/strip) •
[studlyCase](https://twine.phlak.net/methods/studlycase) •
[subtring](https://twine.phlak.net/methods/subtring) •
[trim](https://twine.phlak.net/methods/trim) •
[trimLeft](https://twine.phlak.net/methods/trimleft) •
[trimRight](https://twine.phlak.net/methods/trimright) •
[truncate](https://twine.phlak.net/methods/truncate) •
[uppercase](https://twine.phlak.net/methods/uppercase) •
[url](https://twine.phlak.net/methods/url) •
[words](https://twine.phlak.net/methods/words) •
[wrap](https://twine.phlak.net/methods/wrap) •
[wrapHard](https://twine.phlak.net/methods/wraphard) •
[wrapSoft](https://twine.phlak.net/methods/wrapsoft)

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
