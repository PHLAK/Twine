# What is Twine?

Twine is a string manipulation library with an expressive, fluent syntax.

### The Problem

PHP's built-in string functions are plentiful and work fine for one-off string
operations. However, once you have to spend more than a few cycles working with
strings in PHP, minor annoyances can quickly become problems that make code
harder to read and reason about.

Consider the following code:

```php
$contents = file_get_contents('garbage.bin');

return str_replace("\n", '<br>', wordwrap(base64_encode($contents), 80));
```

With a little analysis we can determine that this code does the following:

1. Grabs the contents of a binary file
2. Encodes the contents of that file to base64
3. Wraps the contents of the string at a line length of 80 characters
4. Replaces all newline characters with a `<br>` element

The main issue with this code is that the order of operations is "inside out."
The order in which things happen starts with the innermost function
(`base64_encode`) and ends with the outermost function (`str_replace`). This
means the way we read the code is backwards from the way it executes.

Additionally, function parameters can become visually disconnected from their
functions. This makes it harder to quickly understand which argument belongs to
which call.

We could rewrite the snippet to make things clearer:

```php
$contents = file_get_contents('garbage.bin');
$base64 = base64_encode($contents);
$wrapped = wordwrap($base64, 80);

return str_replace("\n", '<br>', $wrapped);
```

This solves the inside-out problem and makes parameters easier to follow, but
it also increases line count and introduces short-lived temporary variables.

### The Solution

Twine takes an object-oriented approach to string manipulation and comparison.
Using Twine, we can rewrite the same snippet like this:

```php
$string = new Twine\Str(file_get_contents('garbage.bin'));

return $string->base64()->wrap(80)->replace("\n", '<br>');
```

With Twine, operations read in order, parameters stay close to their methods,
and the overall code is more concise.
