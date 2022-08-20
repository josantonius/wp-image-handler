# CHANGELOG

## 2022-08-20

* The repository was archived.

## 1.0.3 - 2018-01-04

* Implemented `PHP Mess Detector` to detect inconsistencies in code styles.

* Implemented `PHP Code Beautifier and Fixer` to fixing errors automatically.

* Implemented `PHP Coding Standards Fixer` to organize PHP code automatically according to PSR standards.

* Implemented `WordPress PHPCS code standard` from all library PHP files.

* Implemented `Codacy` to automates code reviews and monitors code quality over time.

* Implemented `Codecov` to coverage reports.

* Deprecated `Josantonius\WP_Register\WP_Register::deleteAttachedImages()` method.

* Added `Josantonius\WP_Register\WP_Register::delete_all_attachment()` method.

## 1.0.2 - 2017-10-15

* Unit tests supported by `PHPUnit` were added.

* The repository was synchronized with `Travis CI` to implement continuous integration.

* Added `WP_Image/src/bootstrap.php` file

* Added `WP_Image/tests/bootstrap.php` file.

* Added `WP_Image/tests/test-images/cat.jpg` file.
* Added `WP_Image/tests/test-images/funny.gif` file.
* Added `WP_Image/tests/test-images/sponge.png` file.

* Added `WP_Image/phpunit.xml.dist` file.
* Added `WP_Image/_config.yml` file.
* Added `WP_Image/.travis.yml` file.

* Added `WP_Image/bin/install-wp-tests.sh` file.

* Added `Josantonius\WP_Image\WP_Image::uploadImage` method.

* Added `Josantonius\WP_Image\Test\ImageTest` class.
* Added `Josantonius\WP_Image\Test\ImageTest->setUp()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testUploadJPG()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testUploadPNG()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testUploadGIF()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testUploadUnknownImage()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testSaveJPG()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testSavePNG()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testSaveGIF()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testSaveFeaturedJPG()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testSaveFeaturedPNG()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testSaveFeaturedGIF()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testSaveUnknownImage()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testSaveImageFromUnknownPostID()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testDeleteAttachedImages()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testForceDeleteAttachedImages()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->testDeleteAttachedImagesFromUnknownPostID()` method.
* Added `Josantonius\WP_Image\Test\ImageTest->tearDown()` method.

## 1.0.1 - 2017-08-11

* Added `Josantonius\WP_Image\WP_Image::deleteAttachment` method.

## 1.0.0 - 2017-06-07

* Added `Josantonius\WP_Image\WP_Image` class.
* Added `Josantonius\WP_Image\WP_Image::save` method.
