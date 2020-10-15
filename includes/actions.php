<?php

/**
 * algolia_update_post.
 * @param  [type]  $id
 * @param  WP_Post $post
 * @param  [type]  $update
 * @return [type]
 */
function algolia_update_post($id, WP_Post $post, $update)
{
    if (wp_is_post_revision($id) || wp_is_post_autosave($id)) {
        return $post;
    }

    global $algolia;

    $record = (array) apply_filters($post->post_type.'_to_record', $post);

    if (!isset($record['objectID'])) {
        $record['objectID'] = implode('#', [$post->post_type, $post->ID]);
    }

    $index = $algolia->initIndex(
        apply_filters('algolia_index_name', $post->post_type)
    );

    if ('trash' == $post->post_status) {
        $index->deleteObject($record['objectID']);
    } else {
        $index->saveObject($record);
    }

    return $post;
}

add_action('save_post', 'algolia_update_post', 10, 3);

/**
 * algolia_update_post_meta.
 * @param  [type] $meta_id
 * @param  [type] $object_id
 * @param  [type] $meta_key
 * @param  [type] $_meta_value
 * @return [type]
 */
function algolia_update_post_meta($meta_id, $object_id, $meta_key, $_meta_value)
{
    global $algolia;
    $indexedMetaKeys = ['seo_description', 'seo_title'];

    if (in_array($meta_key, $indexedMetaKeys)) {
        $index = $algolia->initIndex(
            apply_filters('algolia_index_name', 'post')
        );

        $index->partialUpdateObject([
            'objectID' => 'post#'.$object_id,
            $meta_key => $_meta_value,
        ]);
    }
}
add_action('update_post_meta', 'algolia_update_post_meta', 10, 4);
