# PHP WordPress Image

[![Latest Stable Version](https://poser.pugx.org/josantonius/wp_image/v/stable)](https://packagist.org/packages/josantonius/wp_image) [![Total Downloads](https://poser.pugx.org/josantonius/wp_image/downloads)](https://packagist.org/packages/josantonius/wp_image) [![Latest Unstable Version](https://poser.pugx.org/josantonius/wp_image/v/unstable)](https://packagist.org/packages/josantonius/wp_image) [![License](https://poser.pugx.org/josantonius/wp_image/license)](https://packagist.org/packages/josantonius/wp_image)

[Versión en español](README-ES.md)

Save images to WordPress.

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Available Methods](#available-methods)
- [Usage](#usage)
- [TODO](#-todo)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

<p align="center"><strong>Take a look at the code</strong></p>

<p align="center">
  <a href="https://youtu.be/nYA7S3_cxPs" title="Take a look at the code">
  	<img src="https://raw.githubusercontent.com/Josantonius/PHP-Algorithm/master/resources/youtube-thumbnail.jpg">
  </a>
</p>

---

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install PHP Wordpress Image library, simply:

    $ composer require Josantonius/WP_Image

The previous command will only install the necessary files, if you prefer to download the entire source code (including tests, vendor folder, exceptions not used, docs...) you can use:

    $ composer require Josantonius/WP_Image --prefer-source

Or you can also clone the complete repository with Git:

    $ git clone https://github.com/Josantonius/WP_Image.git
    
## Requirements

This library is supported by PHP versions 5.6 or higher and is compatible with HHVM versions 3.0 or higher.

## Quick Start and Examples

To use this class, simply:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\WP_Image\WP_Image;
```

### Save image

```php
WP_Image::save(
	'https://site.com/image.png', // Image url (Required)
	'18'                          // Post ID   (Required)
);
```

### Save featured image

```php
WP_Image::save(
	'https://site.com/image.png', // Image url   (Required)
	'18',                         // Post ID     (Required)
	true                          // Is featured (Optional | Default: false)
);
```

### Delete attachments

```php
WP_Image::deleteAttachedImages(

  18, // Post ID (Required)
);
```

### Force delete attachments

```php
WP_Image::deleteAttachedImages(

  '18', // Post ID     (Required)
  true  // Force delete (Optional | Default: false)
);
```

## Available methods

Available methods in this library:

```php
WP_Image::save();
WP_Image::deleteAttachedImages();
```

## ☑ TODO

- [ ] Add tests
- [ ] Extend method to receive image as data

## Contribute
1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

## Repository

All files in this repository were created and uploaded automatically with [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).
