<?php
use thiagoalessio\TesseractOCR\TesseractOCR;

function myfirsttheme_setup() {
    // Enable featured images
    add_theme_support('post-thumbnails');

    // Dynamic title tag
    add_theme_support('title-tag');

    // Register menu
    register_nav_menus([
        'main-menu' => __('Main Menu', 'myfirsttheme')
    ]);
}
add_action('after_setup_theme', 'myfirsttheme_setup');

// Enqueue CSS
function myfirsttheme_enqueue_styles() {
    wp_enqueue_style('myfirsttheme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'myfirsttheme_enqueue_styles');


// ---------------------------
// OCR Helper Function
// ---------------------------
function run_ocr_on_image($image_path) {
    return (new TesseractOCR($image_path))
        ->executable('C:\\Program Files\\Tesseract-OCR\\tesseract.exe')
        ->run();
}


// ---------------------------
// Run OCR on save_post
// ---------------------------
add_action('save_post', 'my_acf_ocr_extract', 20);
function my_acf_ocr_extract($post_id) {
    if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
        return;
    }

    // ---------------------------
    // Step 1: Get the image (ACF first, then Featured Image)
    // ---------------------------
    $image = get_field('festival_image', $post_id);

    if (!$image) {
        $thumbnail_id = get_post_thumbnail_id($post_id);
        if ($thumbnail_id) {
            $image = ['ID' => $thumbnail_id];
            error_log("OCR fallback: Using featured image for post ID $post_id");
        }
    }

    if (!$image || empty($image['ID'])) {
        error_log("OCR skipped: No festival or featured image set for post ID $post_id");
        return;
    }

    // ---------------------------
    // Step 2: Get the file path
    // ---------------------------
    $image_path = get_attached_file($image['ID']);
    if (!$image_path || !file_exists($image_path)) {
        error_log("OCR failed: Image file does not exist at path $image_path");
        return;
    }

    // ---------------------------
    // Step 3: Decide if OCR should run
    // ---------------------------
    $last_image_id  = get_post_meta($post_id, '_last_ocr_image_id', true);
    $existing_text  = get_field('extracted_text', $post_id);

    $run_ocr = false;

    // Run if image changed
    if ($last_image_id != $image['ID']) {
        $run_ocr = true;
    }

    // Run if no text exists yet
    if (empty($existing_text)) {
        $run_ocr = true;
    }

    if (!$run_ocr) {
        error_log("OCR skipped: No change detected for post ID $post_id");
        return;
    }

    // ---------------------------
    // Step 4: Run OCR and save text
    // ---------------------------
    try {
        $extracted_text = run_ocr_on_image($image_path);

        if (!empty($extracted_text)) {
            update_field('extracted_text', $extracted_text, $post_id);
            update_post_meta($post_id, '_last_ocr_image_id', $image['ID']);
            error_log("✅ OCR updated text for post ID $post_id");
        } else {
            update_field('extracted_text', '', $post_id); // clear if empty
            error_log("⚠️ OCR ran but returned empty text for post ID $post_id");
        }
    } catch (Exception $e) {
        error_log("❌ OCR failed for post ID $post_id: " . $e->getMessage());
    }
}
