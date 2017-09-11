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

String manipulation, leveled up! -- by, [Chris Kankiewicz](https://www.ChrisKankiewicz.com)

Introduction
------------

Twine is a simple string manipulation library with an expressive, fluent syntax.

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
$string = Twine\String('john pinkerton');
```

Usage
-----

Return part of the string.

```php
$string->substring($start, $length = null);
```

Append a suffix to the string.

```php
$string->append($suffix);
```

Prepend the string with a prefix.

```php
$string->prepend($prfix);
```

Insert some text into the string at a given position.

```php
$string->insert($string, $position);
```

Convert all or parts of the string to uppercase.

```php
$string->uppercase($mode = Twine\Config::UC_ALL);
```

Available uppercase modes:

  - `Twine\Config::UC_ALL` - Uppercase all characters of the string
  - `Twine\Config::UC_FIRST` - Uppercase the first character of the string
  - `Twine\Config::UC_WORDS` - Uppercase the first character of each word of the string

Convert all or parts of the string to lowercase.

```php
$string->lowercase($mode = Twine\Config::LC_ALL);
```

Available lowercase modes:

  - `Twine\Config::LC_ALL` - Lowercase all characters of the string
  - `Twine\Config::LC_FIRST` - Lowercase the first character of the string
  - `Twine\Config::LC_WORDS` - Lowercase the first character of each word of the string

Repeat the string multiple times.

```php
$string->repeat($multiplier);
```

Reverse the string.

```php
$string->reverse();
```

Replace parts of the string with another string.

```php
$string->replace($search, $replace, &$count = null);
```

 Randomly shuffle the characters of the string.

```php
$string->shuffle();
```

Pad the string to a specific length.

```php
$string->pad($length, $padding = ' ', $mode = Twine\Config::PAD_RIGHT);
```

Available padding modes:
  - `Twine\Config::PAD_RIGHT` - Only pad the right side of the string
  - `Twine\Config::PAD_LEFT` - Only pad the left side of the string
  - `Twine\Config::PAD_BOTH` - Pad both sides of the string

Remove whitespace or a specific set of characters from the beginning and/or end
of the string.

```php
$string->trim($mask = Twine\Config::TRIM_MASK, $mode = Twine\Config::TRIM_BOTH);
```

Available trim modes:

  - `Twine\Config::TRIM_BOTH` - Trim characters from the beginning and end of the string
  - `Twine\Config::TRIM_LEFT` - Only trim characters from the begining of the string
  - `Twine\Config::TRIM_RIGHT` - Only trim characters from the end of the strring

Wrap the string to a given number of characters.

```php
$string->wrap($width, $break = "\n", $cut = Twine\Config::WRAP_SOFT);
```

Available warp modes:

  - `Twine\Config::WRAP_SOFT` - Wrap after the specified width
  - `Twine\Config::WRAP_HARD` - Always wrap at or before the specified width

### Chaining Methods

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

$string->base64()->wrap(76, "\r\n", true);
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
