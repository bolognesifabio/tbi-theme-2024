<?php
namespace TBI\Models\Core;
use TBI\Helpers\Files;

class Theme {
    public function __construct() {
        $assets_version_hash = Files::get_assets_version()->hash;
        
        add_action('generate_rewrite_rules', [$this, 'add_custom_url_rules']);
        add_filter('query_vars', [$this, 'add_custom_query_vars_filter']);
        add_action('init', [$this, 'activate']);

        // Files::require_in_all_directories('core/widgets');
        Files::require_all_files('core/widgets');
        Files::require_all_files('core/widgets-areas');
        Files::require_in_all_directories('controllers');
        
        wp_register_style('tbi-admin-critical-style', get_template_directory_uri() . '/assets/dist/admin.css', null, $assets_version_hash);
        wp_register_style('tbi-public-critical-style', get_template_directory_uri() . '/assets/dist/public.css', null, $assets_version_hash);
        wp_register_script('tbi-admin-script', get_template_directory_uri() . '/assets/dist/admin.js', null, $assets_version_hash, true);
        wp_register_script('tbi-public-script', get_template_directory_uri() . '/assets/dist/public.js', null, $assets_version_hash, true);

        add_action('admin_enqueue_scripts', [$this, 'load_admin_assets']);
        add_action('login_enqueue_scripts', [$this, 'load_admin_assets']);
        add_action('after_setup_theme', [$this, 'setup']);
        add_action('admin_init', [$this, 'add_slider_category']);

        if (!is_admin()) {
            wp_enqueue_script('tbi-public-script');
            wp_enqueue_style('tbi-public-critical-style');
        }

        add_theme_support('post-thumbnails');
        add_image_size('team-emblem', 9999, 64);
    }

    public function activate() {
        Files::require_all_files('core/post-types');
        Files::require_all_files('core/taxonomies');
        Files::require_in_all_directories('core/metaboxes');
        Files::require_all_files('core/api');
    }

    public function load_admin_assets() {
        wp_enqueue_script('tbi-admin-script');
        wp_enqueue_style('tbi-admin-critical-style');
    }
    
    public function setup() {
        register_nav_menu('top-menu', __('Menu principale'));
        register_nav_menu('footer-menu', __('Menu del footer'));
    }

    public function add_custom_url_rules() {
        global $wp_rewrite;
        $wp_rewrite->rules = ['^competizioni/([^/]*)/([^/]+)/?$' => 'competitions=$matches[1]&season=$matches[2]'] + $wp_rewrite->rules;
    }

    public function add_custom_query_vars_filter($query_vars) {
        $query_vars[] = "season";
        return $query_vars;
    }

    public function add_slider_category() {
        wp_insert_category([
            'cat_name' => 'TBI - Slider',
            'category_description' => 'Categoria per i post da far comparire nello slider in homepage.',
            'category_nicename' => 'tbi-slider',
            'category_parent' => ''
        ]);
    }
}