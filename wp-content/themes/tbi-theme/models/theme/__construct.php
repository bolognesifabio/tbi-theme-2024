<?php
add_action('init', [$this, 'activate']);
add_action('switch_theme', [$this, 'deactivate']);
add_theme_support('post-thumbnails');