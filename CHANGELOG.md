# CHANGELOG

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