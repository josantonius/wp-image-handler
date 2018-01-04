<?php
/**
 * Adding, updating and deleting images from WordPress posts.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   Josantonius\WP_Image
 * @copyright 2017 - 2018 (c) Josantonius - WP_Image
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/WP_Image
 * @since     1.0.2
 */

namespace Josantonius\WP_Image\Test;

use Josantonius\WP_Image\WP_Image;

/**
 * Tests class for WP_Image library.
 *
 * @since 1.0.2
 */
final class Image_Test extends \WP_UnitTestCase {

	/**
	 * WP_Image instance.
	 *
	 * @since 1.0.3
	 *
	 * @var object
	 */
	protected $wp_image;

	/**
	 * Default images.
	 *
	 * @since 1.0.3
	 *
	 * @var array
	 */
	protected $images;

	/**
	 * Set up.
	 */
	public function setUp() {

		parent::setUp();

		$this->wp_image = new WP_Image();

		$url = 'https://raw.githubusercontent.com/Josantonius/WP_Image/';

		$this->images['JPG'] = $url . 'master/tests/test-images/cat.jpg';
		$this->images['GIF'] = $url . 'master/tests/test-images/funny.gif';
		$this->images['PNG'] = $url . 'master/tests/test-images/sponge.png';

		$this->post_ID = $this->factory->post->create(
			[
				'post_title' => 'My Test',
			]
		);
	}

	/**
	 * Check if it is an instance of WP_Register.
	 *
	 * @since 1.0.3
	 */
	public function test_is_instance_of() {

		$this->assertInstanceOf(
			'Josantonius\WP_Image\WP_Image',
			$this->wp_image
		);
	}

	/**
	 * Upload JPG.
	 */
	public function testUploadJPG() {

		$wp_image = $this->wp_image;

		$this->assertTrue(
			file_exists(
				$wp_image::upload( $this->images['JPG'], 'cat.jpg' )
			)
		);
	}

	/**
	 * Upload PNG.
	 */
	public function testUploadPNG() {

		$wp_image = $this->wp_image;

		$this->assertTrue(
			file_exists(
				$wp_image::upload( $this->images['PNG'], 'sponge.png' )
			)
		);
	}

	/**
	 * Upload GIF.
	 */
	public function testUploadGIF() {

		$wp_image = $this->wp_image;

		$this->assertTrue(
			file_exists(
				$wp_image::upload( $this->images['GIF'], 'funny.gif' )
			)
		);
	}

	/**
	 * Upload unknown image.
	 */
	public function testUploadUnknownImage() {

		$wp_image = $this->wp_image;

		$this->assertFalse(
			$wp_image::upload( 'unknown', 'cat.jpg' )
		);
	}

	/**
	 * Save JPG attached to the post.
	 */
	public function testSaveJPG() {

		$wp_image = $this->wp_image;

		$this->assertNotFalse(
			$wp_image::save( $this->images['JPG'], $this->post_ID )
		);

		$attachment = get_posts(
			[
				'post_type'   => 'attachment',
				'post_parent' => $this->post_ID,
			]
		);

		$this->assertTrue(
			( 'cat.jpg' === $attachment[0]->post_title )
		);
	}

	/**
	 * Save PNG attached to the post.
	 */
	public function testSavePNG() {

		$wp_image = $this->wp_image;

		$this->assertNotFalse(
			$wp_image::save( $this->images['PNG'], $this->post_ID )
		);

		$attachment = get_posts(
			[
				'post_type'   => 'attachment',
				'post_parent' => $this->post_ID,
			]
		);

		$this->assertTrue(
			( 'sponge.png' === $attachment[0]->post_title )
		);
	}

	/**
	 * Save GIF attached to the post.
	 */
	public function testSaveGIF() {

		$wp_image = $this->wp_image;

		$this->assertNotFalse(
			$wp_image::save( $this->images['GIF'], $this->post_ID )
		);

		$attachment = get_posts(
			[
				'post_type'   => 'attachment',
				'post_parent' => $this->post_ID,
			]
		);

		$this->assertTrue(
			( 'funny.gif' === $attachment[0]->post_title )
		);
	}

	/**
	 * Save featured JPG attached to the post.
	 */
	public function testSaveFeaturedJPG() {

		$wp_image = $this->wp_image;

		$this->assertNotFalse(
			$wp_image::save( $this->images['JPG'], $this->post_ID, true )
		);

		$attachment = get_posts(
			[
				'post_type'   => 'attachment',
				'post_parent' => $this->post_ID,
			]
		);

		$this->assertTrue(
			( 'cat.jpg' === $attachment[0]->post_title )
		);

		$this->assertTrue(
			( (int) get_post_thumbnail_id( $this->post_ID ) === $attachment[0]->ID )
		);
	}

	/**
	 * Save featured PNG attached to the post.
	 */
	public function testSaveFeaturedPNG() {

		$wp_image = $this->wp_image;

		$this->assertNotFalse(
			$wp_image::save( $this->images['PNG'], $this->post_ID, true )
		);

		$attachment = get_posts(
			[
				'post_type'   => 'attachment',
				'post_parent' => $this->post_ID,
			]
		);

		$this->assertTrue(
			( 'sponge.png' === $attachment[0]->post_title )
		);

		$this->assertTrue(
			( (int) get_post_thumbnail_id( $this->post_ID ) === $attachment[0]->ID )
		);
	}

	/**
	 * Save featured GIF attached to the post.
	 */
	public function testSaveFeaturedGIF() {

		$wp_image = $this->wp_image;

		$this->assertNotFalse(
			$wp_image::save( $this->images['GIF'], $this->post_ID, true )
		);

		$attachment = get_posts(
			[
				'post_type'   => 'attachment',
				'post_parent' => $this->post_ID,
			]
		);

		$this->assertTrue(
			( 'funny.gif' === $attachment[0]->post_title )
		);

		$this->assertTrue(
			( (int) get_post_thumbnail_id( $this->post_ID ) === $attachment[0]->ID )
		);
	}

	/**
	 * Save unknown image attached to the post.
	 */
	public function testSaveUnknownImage() {

		$wp_image = $this->wp_image;

		$this->assertFalse(
			$wp_image::save( 'unknown', $this->post_ID )
		);
	}

	/**
	 * Save image attached to the post from unknown post ID.
	 */
	public function testSaveImageFromUnknownPostID() {

		$wp_image = $this->wp_image;

		$this->assertFalse(
			$wp_image::save( $this->images['PNG'], 'X' )
		);
	}

	/**
	 * Delete attached images.
	 */
	public function testDeleteAttachedImages() {

		$wp_image = $this->wp_image;

		$this->assertNotFalse(
			$wp_image::save( $this->images['JPG'], $this->post_ID )
		);

		$this->assertNotFalse(
			$wp_image::save( $this->images['PNG'], $this->post_ID )
		);

		$this->assertNotFalse(
			$wp_image::save( $this->images['GIF'], $this->post_ID )
		);

		$this->assertTrue(
			( $wp_image::delete_all_attachment( $this->post_ID ) === 3 )
		);
	}

	/**
	 * Force delete attached images.
	 */
	public function testForceDeleteAttachedImages() {

		$wp_image = $this->wp_image;

		$this->assertNotFalse(
			$wp_image::save( $this->images['JPG'], $this->post_ID )
		);

		$this->assertNotFalse(
			$wp_image::save( $this->images['PNG'], $this->post_ID )
		);

		$this->assertNotFalse(
			$wp_image::save( $this->images['GIF'], $this->post_ID )
		);

		$this->assertTrue(
			( $wp_image::delete_all_attachment( $this->post_ID, true ) === 3 )
		);
	}

	/**
	 * Delete attached images from unkanown post ID.
	 */
	public function testDeleteAttachedImagesFromUnknownPostID() {

		$wp_image = $this->wp_image;

		$this->assertNotFalse(
			$wp_image::save( $this->images['JPG'], $this->post_ID )
		);

		$this->assertNotFalse(
			$wp_image::save( $this->images['PNG'], $this->post_ID )
		);

		$this->assertNotFalse(
			$wp_image::save( $this->images['GIF'], $this->post_ID )
		);

		$this->assertFalse(
			$wp_image::delete_all_attachment( 'X' )
		);
	}

	/**
	 * Tear down.
	 *
	 * @since 1.0.4
	 */
	public function tearDown() {
		parent::tearDown();
	}
}
