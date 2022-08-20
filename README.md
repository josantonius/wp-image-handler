# PHP WordPress Image

[![Latest Stable Version](https://poser.pugx.org/josantonius/wp-image-handler/v/stable)](https://packagist.org/packages/josantonius/wp-image-handler)
[![License](https://poser.pugx.org/josantonius/wp-image-handler/license)](LICENSE)

[Versión en español](README-ES.md)

Adding, updating and deleting images from WordPress posts.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [Sponsor](#Sponsor)
- [License](#license)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **WP_Image library**, simply:

    composer require josantonius/wp-image-handler

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    composer require josantonius/wp-image-handler --prefer-source

You can also **clone the complete repository** with Git:

    git clone https://github.com/josantonius/wp-image-handler.git

Or **install it manually**:

[Download WP_Image.php](https://raw.githubusercontent.com/josantonius/wp-image-handler/master/src/class-wp-image.php):

    wget https://raw.githubusercontent.com/josantonius/wp-image-handler/master/src/class-wp-image.php

## Available Methods

Available methods in this library:

### - Save image and associate it with a specific post

```php
WP_Image::save($url, $post_ID, $featured);
```

| Atttribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $url | External url image. | string | Yes | |
| $post_ID | Post ID. | int | Yes | |
| $featured | Set image as featured. | boolean | No | false |

**@return** (string|false) → URI for an attachment file or false on failure.

### - Upload image to WordPress upload directory

```php
WP_Image::upload($url, $filename);
```

| Atttribute | Description | Type | Required
| --- | --- | --- | --- |
| $url | External url image. | string | Yes |
| $filename| Filename. | string | Yes |

**@return** (string|false) → Path to upload image or false on failure.

### - Deletes an attachment and all of its derivatives

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

### - Upload image

```php
WP_Image::upload('https://site.com/image.png', 'image.png');
```

### - Save image

```php
WP_Image::upload('https://site.com/image.png', '18');
```

### - Save featured image

```php
WP_Image::upload('https://site.com/image.png', '18', true);
```

### - Delete attachments

```php
WP_Image::delete_all_attachment(18);
```

### - Force delete attachments

```php
WP_Image::delete_all_attachment('18', true);
```

## Tests

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    git clone https://github.com/josantonius/wp-image-handler.git
    
    cd WP_Image

    bash bin/install-wp-tests.sh wordpress_test root '' localhost latest

    composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    composer phpunit

Run [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    composer phpmd

Run all previous tests:

    composer tests

## Sponsor

If this project helps you to reduce your development time,
[you can sponsor me](https://github.com/josantonius#sponsor) to support my open source work :blush:

## License

This repository is licensed under the [MIT License](LICENSE).

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius#contact)
