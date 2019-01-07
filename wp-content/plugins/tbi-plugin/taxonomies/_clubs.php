<?php
register_taxonomy(
    'clubs',
    ['teams'],
    [
        'labels' => [
            'name' => _x('Società', 'taxonomy general name'),
            'singular_name' => _x('Società', 'taxonomy singular name'),
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