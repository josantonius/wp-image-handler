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
        
        parent::setUp();
        
        $url = 'https://raw.githubusercontent.com/Josantonius/WP_Image/';

        $this->JPG = $url . 'master/tests/test-images/cat.jpg';
        $this->GIF = $url . 'master/tests/test-images/funny.gif';
        $this->PNG = $url . 'master/tests/test-images/sponge.png';

        $this->postID = $this->factory->post->create([

            'post_title' => 'My Test'
        ]); 
    }

    /**
     * Upload JPG.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testUploadJPG() {

        $this->assertTrue(

            file_exists(

                WP_Image::upload($this->JPG, 'cat.jpg')
            )
        );
    }

    /**
     * Upload PNG.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testUploadPNG() {

        $this->assertTrue(

            file_exists(

                WP_Image::upload($this->PNG, 'sponge.png')
            )
        );
    }

    /**
     * Upload GIF.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testUploadGIF() {

        $this->assertTrue(

            file_exists(

                WP_Image::upload($this->GIF, 'funny.gif')
            )
        );
    }

    /**
     * Upload unknown image.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testUploadUnknownImage() {

        $this->assertFalse(

            WP_Image::upload('unknown', 'cat.jpg')
        );
    }

    /**
     * Save JPG attached to the post.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testSaveJPG() {

        $this->assertNotFalse(

            WP_Image::save($this->JPG, $this->postID)
        );

        $attachment = get_posts([

            'post_type'   => 'attachment', 
            'post_parent' => $this->postID
        ]);

        $this->assertTrue(

            ($attachment[0]->post_title === 'cat.jpg')
        );
    }

    /**
     * Save PNG attached to the post.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testSavePNG() {

        $this->assertNotFalse(

            WP_Image::save($this->PNG, $this->postID)
        );

        $attachment = get_posts([

            'post_type'   => 'attachment', 
            'post_parent' => $this->postID
        ]);

        $this->assertTrue(

            ($attachment[0]->post_title === 'sponge.png')
        );
    }

    /**
     * Save GIF attached to the post.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testSaveGIF() {

        $this->assertNotFalse(

            WP_Image::save($this->GIF, $this->postID)
        );

        $attachment = get_posts([

            'post_type'   => 'attachment', 
            'post_parent' => $this->postID
        ]);

        $this->assertTrue(

            ($attachment[0]->post_title === 'funny.gif')
        );
    }

    /**
     * Save featured JPG attached to the post.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testSaveFeaturedJPG() {

        $this->assertNotFalse(

            WP_Image::save($this->JPG, $this->postID, true)
        );

        $attachment = get_posts([

            'post_type'   => 'attachment', 
            'post_parent' => $this->postID
        ]);

        $this->assertTrue(

            ($attachment[0]->post_title === 'cat.jpg')
        );

        $this->assertTrue(

            ($attachment[0]->ID === (int) get_post_thumbnail_id($this->postID))
        );
    }

    /**
     * Save featured PNG attached to the post.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testSaveFeaturedPNG() {

        $this->assertNotFalse(

            WP_Image::save($this->PNG, $this->postID, true)
        );

        $attachment = get_posts([

            'post_type'   => 'attachment', 
            'post_parent' => $this->postID
        ]);

        $this->assertTrue(

            ($attachment[0]->post_title === 'sponge.png')
        );

        $this->assertTrue(

            ($attachment[0]->ID === (int) get_post_thumbnail_id($this->postID))
        );
    }

    /**
     * Save featured GIF attached to the post.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testSaveFeaturedGIF() {

        $this->assertNotFalse(

            WP_Image::save($this->GIF, $this->postID, true)
        );

        $attachment = get_posts([

            'post_type'   => 'attachment', 
            'post_parent' => $this->postID
        ]);

        $this->assertTrue(

            ($attachment[0]->post_title === 'funny.gif')
        );

        $this->assertTrue(

            ($attachment[0]->ID === (int) get_post_thumbnail_id($this->postID))
        );
    }

    /**
     * Save unknown image attached to the post.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testSaveUnknownImage() {

        $this->assertFalse(

            WP_Image::save('unknown', $this->postID)
        );
    }

    /**
     * Save image attached to the post from unknown post ID.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testSaveImageFromUnknownPostID() {

        $this->assertFalse(

            WP_Image::save($this->PNG, 'X')
        );
    }

    /**
     * Delete attached images.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testDeleteAttachedImages() {

        $this->assertNotFalse(

            WP_Image::save($this->JPG, $this->postID)
        );

        $this->assertNotFalse(

            WP_Image::save($this->PNG, $this->postID)
        );

        $this->assertNotFalse(

            WP_Image::save($this->GIF, $this->postID)
        );

        $this->assertTrue(

            (WP_Image::deleteAttachedImages($this->postID) === 3)
        );
    }

    /**
     * Force delete attached images.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testForceDeleteAttachedImages() {

        $this->assertNotFalse(

            WP_Image::save($this->JPG, $this->postID)
        );

        $this->assertNotFalse(

            WP_Image::save($this->PNG, $this->postID)
        );

        $this->assertNotFalse(

            WP_Image::save($this->GIF, $this->postID)
        );

        $this->assertTrue(

            (WP_Image::deleteAttachedImages($this->postID, true) === 3)
        );
    }

    /**
     * Delete attached images from unkanown post ID.
     *
     * @since 1.0.2
     *
     * @return void
     */
    public function testDeleteAttachedImagesFromUnknownPostID() {

        $this->assertNotFalse(

            WP_Image::save($this->JPG, $this->postID)
        );

        $this->assertNotFalse(

            WP_Image::save($this->PNG, $this->postID)
        );

        $this->assertNotFalse(

            WP_Image::save($this->GIF, $this->postID)
        );

        $this->assertFalse(

            WP_Image::deleteAttachedImages('X')
        );
    }

    /**
     * Tear down.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function tearDown() {
    
        parent::tearDown();
    }
}
