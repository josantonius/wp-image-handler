<?php 
/**
 * Save images to WordPress.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/WP_Image
 * @since      1.0.0
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
     * @since 1.0.0
     *
     * @param string  $url      → external url image
     * @param int     $postID   → post id
     * @param boolean $featured → if image is featured
     *
     * @return string|false → URI for an attachment file or false on failure
     */
    public static function save($url, $postID, $featured = false) {

        $url = filter_var($url, FILTER_VALIDATE_URL);

        if ($url === false || get_post_status($postID) === false) {
         
            return false;
        }  

        $filename = basename($url);

        $filepath = self::upload($url, $filename);

        $attachment = [

            'post_mime_type' => wp_check_filetype($filename, null)['type'],
            'post_title'     => sanitize_file_name($filename),
            'post_content'   => '',
            'post_status'    => 'inherit'
        ];

        $attachID = wp_insert_attachment($attachment, $filepath, $postID);

        require_once(ABSPATH . 'wp-admin/includes/image.php');

        $attachData = wp_generate_attachment_metadata($attachID, $filepath);

        wp_update_attachment_metadata($attachID, $attachData);

        if ($featured) {

            set_post_thumbnail($postID, $attachID);
        }

        return wp_get_attachment_url($attachID);
    }

    /**
     * Upload image to WordPress upload directory.
     * 
     * @since 1.0.2
     *
     * @param string $url      → external url image
     * @param string $filename → filename
     *
     * @return string|false → path to upload image or false on failure
     */
    public static function upload($url, $filename) {

        $dir = wp_upload_dir(); 
        
        if (!isset($dir['path'], $dir['basedir'])) {

            return false;
        }

        $path = wp_mkdir_p($dir['path']) ? $dir['path'] : $dir['basedir'];

        $path = rtrim($path, '/') . '/';

        if ($imageData = @file_get_contents($url)) {

            $state = @file_put_contents($path . $filename, $imageData);
        }

        return (isset($state) && $state) ? $path . $filename : false;
    }

    /**
     * Deletes an attachment and all of its derivatives.
     * 
     * @since 1.0.1
     *
     * @param int     $postID → post id
     * @param boolean $force  → force deletion 
     *
     * @return int|false → attachments deleted
     */
    public static function deleteAttachedImages($postID, $force = false) {

        if (get_post_status($postID) === false) { return false; }  

        $counter = 0;

        $attachments = get_posts([

            'post_type'      => 'attachment',
            'posts_per_page' => -1,
            'post_status'    => 'any',
            'post_mime_type' => 'image/jpeg, image/png, image/gif',
            'post_parent'    => $postID
        ]);

        foreach ($attachments as $attachment) {

            if (wp_delete_attachment($attachment->ID, $force) !== false) {

                $counter++;
            }
        }

        return $counter;
    }
}
