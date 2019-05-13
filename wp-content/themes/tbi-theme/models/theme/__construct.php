<?php
add_action('init', [$this, 'activate']);
add_action('admin_enqueue_scripts', [$this, 'load_resources']);
add_action('login_enqueue_scripts', [$this, 'load_resources']);

add_theme_support('post-thumbnails');