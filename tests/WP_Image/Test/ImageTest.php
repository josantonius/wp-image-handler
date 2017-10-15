<?php 
/**
 * Save images to WordPress.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/WP_Image
 * @since      1.0.2
 */

namespace Josantonius\WP_Image\Test;

use Josantonius\WP_Image\WP_Image;

/**
 * Tests class for WP_Image library.
 * 
 * @since 1.0.2
 */
final class ImageTest extends \WP_UnitTestCase { 

    /**
     * Set up.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function setUp() {

        $url = home_url();

        $this->JPG = $url . '/cat.jpg';
        $this->GIF = $url . '/funny.gif';
        $this->PNG = $url . '/sponge.png';
    }

    /**
     * Unify files specifying the same url path for styles and scripts.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testUploadJPG() {

        $this->assertContains('www',

            WP_Image::upload($this->JPG, 'cat.jpg')
        );
    }
}
