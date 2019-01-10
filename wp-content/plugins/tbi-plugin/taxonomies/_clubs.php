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
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => true,
        'capabilities' => [
            'manage_terms' => 'manage_clubs_terms',
            'edit_terms' => 'edit_clubs_terms',
            'delete_terms' => 'delete_clubs_terms'
        ]
    ]
);