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
        'query_var' => true,
        'meta_box_cb' => false,
        'rewrite' => [
            'slug' => 'stagioni'
        ]
    ]
);