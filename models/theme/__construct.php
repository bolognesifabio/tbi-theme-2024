<?php
use TBI\Helpers\Files;

$assets_version_hash = Files::get_assets_version()->hash;

add_action('init', [$this, 'activate']);

Files::require_all_folders('app/widgets');
Files::require_all_files('app/widgets-areas');

require_once(get_template_directory() . '/controllers/index.php');

wp_register_style('tbi-admin-critical-style', get_template_directory_uri() . '/assets/dist/admin.css', null, $assets_version_hash);
wp_register_style('tbi-public-critical-style', get_template_directory_uri() . '/assets/dist/public.css', null, $assets_version_hash);
wp_register_script('tbi-admin-script', get_template_directory_uri() . '/assets/dist/admin.js', null, $assets_version_hash, true);
wp_register_script('tbi-public-script', get_template_directory_uri() . '/assets/dist/public.js', null, $assets_version_hash, true);

add_action('admin_enqueue_scripts', [$this, 'load_admin_assets']);
add_action('login_enqueue_scripts', [$this, 'load_admin_assets']);
add_action('after_setup_theme', [$this, 'setup']);

if (!is_admin()) {
    wp_enqueue_script('tbi-public-script');
    wp_enqueue_style('tbi-public-critical-style');
}

add_theme_support('post-thumbnails');