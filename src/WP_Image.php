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
     * Save image from url to WordPress.
     * 
     * @since 1.0.0
     *
     * @param string  $imageUrl → external url image
     * @param int     $postID   → post id
     * @param boolean $featured → if image is featured
     *
     * @return string|false → URI for an attachment file or false on failure
     */
    public static function save($imageUrl, $postID, $featured = false) {

        $DS = DIRECTORY_SEPARATOR;

        if (filter_var($imageUrl, FILTER_VALIDATE_URL) === false) {
         
            return false;
        }  

        $upload_dir = wp_upload_dir();  

        $image_data = file_get_contents($imageUrl);

        $filename = basename($imageUrl);

        if (wp_mkdir_p($upload_dir['path'])) {

            $file = $upload_dir['path'] . $DS . $filename;

        } else {

            $file = $upload_dir['basedir'] . $DS . $filename;
        }

        file_put_contents($file, $image_data);

        $wp_filetype = wp_check_filetype($filename, null);

        $attachment = [

            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => sanitize_file_name($filename),
            'post_content'   => '',
            'post_status'    => 'inherit'
        ];

        $attach_id = wp_insert_attachment($attachment, $file, $postID);

        require_once(ABSPATH . 'wp-admin'.$DS.'includes'.$DS.'image.php');

        $attach_data = wp_generate_attachment_metadata($attach_id, $file);

        wp_update_attachment_metadata($attach_id, $attach_data);

        if ($featured) {

            set_post_thumbnail($postID, $attach_id);
        }

        return wp_get_attachment_url($attach_id);
    }
}
