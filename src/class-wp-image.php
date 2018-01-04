<?php
/**
 * Adding, updating and deleting images from WordPress posts.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   Josantonius\WP_Image
 * @copyright 2017 - 2018 (c) Josantonius - WP_Image
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/WP_Image
 * @since     1.0.0
 */

namespace Josantonius\WP_Image;

/**
 * Save image to WordPress.
 *
 * @since 1.0.0
 */
class WP_Image {

	/**
	 * Save image and associate it with a specific post.
	 *
	 * @param string  $url      → external url image.
	 * @param int     $post_ID  → post id.
	 * @param boolean $featured → if image is featured.
	 *
	 * @return string|false → URI for an attachment file or false on failure.
	 */
	public static function save( $url, $post_ID, $featured = false ) {

		$url = filter_var( $url, FILTER_VALIDATE_URL );

		if ( false === $url || false === get_post_status( $post_ID ) ) {
			return false;
		}

		$filename = basename( $url );
		$filepath = self::upload( $url, $filename );

		$attachment = [
			'post_mime_type' => wp_check_filetype( $filename, null )['type'],
			'post_title'     => sanitize_file_name( $filename ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		];

		$attach_id = wp_insert_attachment( $attachment, $filepath, $post_ID );

		require_once( ABSPATH . 'wp-admin/includes/image.php' );

		$attach_data = wp_generate_attachment_metadata( $attach_id, $filepath );

		wp_update_attachment_metadata( $attach_id, $attach_data );

		if ( $featured ) {
			set_post_thumbnail( $post_ID, $attach_id );
		}

		return wp_get_attachment_url( $attach_id );
	}

	/**
	 * Upload image to WordPress upload directory.
	 *
	 * @since 1.0.2
	 *
	 * @param string $url      → external url image.
	 * @param string $filename → filename.
	 *
	 * @return string|false → path to upload image or false on failure.
	 */
	public static function upload( $url, $filename ) {

		$dir = wp_upload_dir();

		if ( ! isset( $dir['path'], $dir['basedir'] ) ) {
			return false;
		}

		$path = wp_mkdir_p( $dir['path'] ) ? $dir['path'] : $dir['basedir'];
		$path = rtrim( $path, '/' ) . '/';

		$image_data = @file_get_contents( $url );

		if ( $image_data ) {
			$state = @file_put_contents( $path . $filename, $image_data );
		}

		return ( isset( $state ) && $state ) ? $path . $filename : false;
	}

	/**
	 * Deletes an attachment and all of its derivatives.
	 *
	 * @since 1.0.3
	 *
	 * @param int     $post_ID → post id.
	 * @param boolean $force   → force deletion.
	 *
	 * @return int|false → attachments deleted.
	 */
	public static function delete_all_attachment( $post_ID, $force = false ) {

		if ( get_post_status( $post_ID ) === false ) {
			return false;
		}

		$counter = 0;

		$attachments = get_posts(
			[
				'post_type'      => 'attachment',
				'posts_per_page' => 100,
				'post_status'    => 'any',
				'post_mime_type' => 'image/jpeg, image/png, image/gif',
				'post_parent'    => $post_ID,
			]
		);

		foreach ( $attachments as $attachment ) {
			if ( wp_delete_attachment( $attachment->ID, $force ) !== false ) {
				$counter++;
			}
		}

		return $counter;
	}

	/**
	 * Deletes an attachment and all of its derivatives.
	 *
	 * IMPORTANT: This method will be removed soon, use 'delete_all_attachment()'.
	 *
	 * @since 1.0.1
	 *
	 * @deprecated 1.0.3
	 *
	 * @param int     $post_ID → post id.
	 * @param boolean $force   → force deletion.
	 *
	 * @return int|false → attachments deleted.
	 */
	public static function deleteAttachedImages( $post_ID, $force = false ) {
		return self::delete_all_attachment( $post_ID, $force );
	}
}
