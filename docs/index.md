---
layout: home

hero:
  name: "Twine"
  tagline: "String manipulation, leveled up"
  # tagline: "<code>composer require phlak/twine</code>"

  image:
    src: /images/twine.svg
    alt: Twine
  
  actions:
    - theme: brand
      text: What is Twine?
      link: /what-is-twine
      
    - theme: alt
      text: Installation
      link: /installation
      
    - theme: alt
      text: Usage
      link: /usage

features:
  - title: Fluent API
    details: Chain expressive string operations in the order you read and reason about them.
    
  - title: Methods Galore
    details: A extensive toolkit for formatting, matching, encoding, hashing, transformations and more.
    
  - title: Multibyte Ready
    details: Built to work with PHP multibyte strings using the mbstring extension.
---


```php
use PHLAK\Twine;

$string = new Twine\Str('john pinkerton');

echo $string; // john pinkerton

// Do some basic manipulation
$string->reverse(); // notreknip nhoj
$string->trim('jnot') // hn pinker
$string->uppercase(Twine\Config\Uppercase::WORDS); // John Pinkerton
// or use the alias
$string->uppercaseWords(); // John Pinkerton

// Perform some logic
$string->contains('pink'); // true
$string->contains('purple'); // false
$string->startsWith('john'); // true
$string->equals('bob pinkerton'); // false

// Chain methods for enhanced functionality
$string->prepend('mr. ')->uppercaseWords(); // Mr. John Pinkerton
$string->substring(5, 4)->equals('pink'); // true
