<?php
namespace TBI\Models;
use TBI\Helpers\Files;

class Theme {
    public function __construct() {
        $assets_version_hash = Files::get_assets_version()->hash;

        add_action('init', [$this, 'activate']);

        Files::require_all_folders('app/widgets');
        Files::require_all_files('app/widgets-areas');
        Files::require_all_folders('controllers');

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
    }

    public function activate() {
        Files::require_all_files('app/post-types');
        Files::require_all_files('app/taxonomies');
        Files::require_all_files('app/metaboxes');
        Files::require_all_files('app/api');

        flush_rewrite_rules();
    }

    public function load_admin_assets() {
        wp_enqueue_script('tbi-admin-script');
        wp_enqueue_style('tbi-admin-critical-style');
    }
    
    public function setup() {
        register_nav_menu('top-menu', __('Menu principale'));
        register_nav_menu('footer-menu', __('Menu del footer'));
    }
}