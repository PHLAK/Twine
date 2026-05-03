# Installation

Twine can be installed on a per-project basis. The recommended installation 
method is PHP's [Composer](https://getcomposer.org/) package manager.

> [!INFO] Requirements
> Twine requires PHP with the `mbstring` and `openssl` extensions, plus Composer.

With Composer installed, run `composer require` from your application directory.

```bash
composer require phlak/twine
```

> [!TIP]
> Make sure `~/.composer/vendor/bin` is in your `$PATH`.
