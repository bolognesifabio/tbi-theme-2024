<?php
register_activation_hook(__FILE__, [$this, 'activate']);
register_deactivation_hook(__FILE__, [$this, 'deactivate']);

add_action('init', [$this, 'add_post_types']);
add_action('init', [$this, 'add_taxonomies']);

add_action('admin_enqueue_scripts', [$this, 'load_resources']);
add_action('login_enqueue_scripts', [$this, 'load_resources']);