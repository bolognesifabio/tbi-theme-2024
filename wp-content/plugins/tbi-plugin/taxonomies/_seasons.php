<?php
register_taxonomy(
    'seasons',
    ['leagues', 'cups'],
    [
        'labels' => [
            'name' => 'Stagioni',
            'singular_name' => 'Stagione'
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'query_var' => true,
        'meta_box_cb' => false,
        'rewrite' => [
            'slug' => 'stagioni'
        ]
    ]
);