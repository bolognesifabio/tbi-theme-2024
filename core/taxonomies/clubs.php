<?php
register_taxonomy(
    'clubs_taxonomy',
    ['teams'],
    [
        'labels' => [
            'name' => 'Società',
            'singular_name' => 'Società'
        ],
        'hierarchical' => true,
        'show_ui' => false,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => [
            'slug' => 'societa'
        ]
    ]
);