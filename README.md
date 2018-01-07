# PHP WordPress Image

[![Latest Stable Version](https://poser.pugx.org/josantonius/WP_Image/v/stable)](https://packagist.org/packages/josantonius/WP_Image) [![Latest Unstable Version](https://poser.pugx.org/josantonius/WP_Image/v/unstable)](https://packagist.org/packages/josantonius/WP_Image) [![License](https://poser.pugx.org/josantonius/WP_Image/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/9a6e81cf618944ad8f18161a319d0812)](https://www.codacy.com/app/Josantonius/WP_Image?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/WP_Image&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/WP_Image/downloads)](https://packagist.org/packages/josantonius/WP_Image) [![Travis](https://travis-ci.org/Josantonius/WP_Image.svg)](https://travis-ci.org/Josantonius/WP_Image) [![WP](https://img.shields.io/badge/WordPress-Standar-1abc9c.svg)](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) [![CodeCov](https://codecov.io/gh/Josantonius/WP_Image/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/WP_Image)

[Versión en español](README-ES.md)

Adding, updating and deleting images from WordPress posts.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **WP_Image library**, simply:

    $ composer require Josantonius/WP_Image

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require Josantonius/WP_Image --prefer-source

You can also **clone the complete repository** with Git:

    $ git clone https://github.com/Josantonius/WP_Image.git

Or **install it manually**:

[Download WP_Image.php](https://raw.githubusercontent.com/Josantonius/WP_Image/master/src/class-wp-image.php):

    $ wget https://raw.githubusercontent.com/Josantonius/WP_Image/master/src/class-wp-image.php

## Available Methods

Available methods in this library:

### - Save image and associate it with a specific post:

```php
WP_Image::save($url, $post_ID, $featured);
```

| Atttribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $url | External url image. | string | Yes | |
| $post_ID | Post ID. | int | Yes | |
| $featured | Set image as featured. | boolean | No | false |

**@return** (string|false) → URI for an attachment file or false on failure.

### - Upload image to WordPress upload directory:

```php
WP_Image::upload($url, $filename);
```

| Atttribute | Description | Type | Required
| --- | --- | --- | --- |
| $url | External url image. | string | Yes |
| $filename| Filename. | string | Yes |

**@return** (string|false) → Path to upload image or false on failure.

### - Deletes an attachment and all of its derivatives:

```php
WP_Image::delete_all_attachment($post_ID, $force);
```

| Atttribute | Description | Type | Required
| --- | --- | --- | --- |
| $post_ID | Post ID. | int | Yes |
| $force| Force deletion. | boolean | Yes |

**@return** (int|false) → Atachments deleted.

## Quick Start

To use this library with **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\WP_Image;
```

Or If you installed it **manually**, use it:

```php
require_once __DIR__ . '/class-wp-image.php';

use Josantonius\WP_Image\WP_Image;
```

## Usage

Example of use for this library:

### - Upload image:

```php
WP_Image::upload('https://site.com/image.png', 'image.png');
```

### - Save image:

```php
WP_Image::upload('https://site.com/image.png', '18');
```

### - Save featured image:

```php
WP_Image::upload('https://site.com/image.png', '18', true);
```

### - Delete attachments:

```php
WP_Image::delete_all_attachment(18);
```

### - Force delete attachments:

```php
WP_Image::delete_all_attachment('18', true);
```

## Tests 

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/Josantonius/WP_Image.git
    
    $ cd WP_Image

    $ bash bin/install-wp-tests.sh wordpress_test root '' localhost latest

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    $ composer phpmd

Run all previous tests:

    $ composer tests

## ☑ TODO

- [ ] Add new feature.
- [ ] Improve tests.
- [ ] Improve documentation.
- [ ] Refactor code for disabled code style rules. See [phpmd.xml](phpmd.xml) and [.php_cs.dist](.php_cs.dist).

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/Josantonius/WP_Image/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

## Repository

The file structure from this repository was created with [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).