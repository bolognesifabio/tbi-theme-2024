<?php
register_taxonomy(
    'clubs',
    ['teams'],
    [
        'hierarchical' => true,
        'labels' => [
            'name' => _x('Società', 'taxonomy general name'),
            'singular_name' => _x('Società', 'taxonomy singular name'),
        ],
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => true,
    ]
);