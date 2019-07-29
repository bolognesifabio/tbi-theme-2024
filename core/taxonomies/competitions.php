<?php
register_taxonomy(
    'competitions_taxonomy',
    ['leagues', 'cups'],
    [
        'labels' => [
            'name' => 'Competizioni',
            'singular_name' => 'Competizione'
        ],
        'hierarchical' => true,
        'show_ui' => false,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'query_var' => true,
        'rewrite' => [
            'slug' => 'competizioni'
        ]
    ]
);