<?php
register_taxonomy(
    'clubs',
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
        ],
        'capabilities' => [
            'manage_terms' => 'manage_clubs_terms',
            'edit_terms' => 'edit_clubs_terms',
            'delete_terms' => 'delete_clubs_terms'
        ]
    ]
);