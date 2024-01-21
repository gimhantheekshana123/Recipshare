<?php
/*
Plugin Name: Custom Recipe Functions
Description: Custom functionality for recipe submissions.
Version: 1.0
Author: root
*/

// Add your custom functions here

add_action('wpcf7_mail_sent', 'save_recipe_post', 10, 1);

function save_recipe_post($contact_form) {
    $title = sanitize_text_field($_POST['recipe-name']);
    $ingredients = sanitize_textarea_field($_POST['ingredients']);
    $instructions = sanitize_textarea_field($_POST['instructions']);
    $cooking_time = absint($_POST['cooking-time']);

    $recipe_data = array(
        'post_title' => $title,
        'post_content' => $instructions,
        'post_type' => 'recipe',
        'post_status' => 'publish',
    );

    $recipe_id = wp_insert_post($recipe_data);

    // Attach ingredients as post meta
    update_post_meta($recipe_id, 'ingredients', $ingredients);

    // Attach cooking time as post meta
    update_post_meta($recipe_id, 'cooking_time', $cooking_time);

    // Upload and attach the image
    if (!empty($_FILES['recipe-image']['name'])) {
        $attachment_id = upload_recipe_image($_FILES['recipe-image'], $recipe_id);
        set_post_thumbnail($recipe_id, $attachment_id);
    }
}

function upload_recipe_image($file, $post_id) {
    require_once(ABSPATH . 'wp-admin/includes/admin.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $attachment_id = media_handle_upload('recipe-image', $post_id);

    return $attachment_id;
}

