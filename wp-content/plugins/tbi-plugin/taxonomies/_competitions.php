<?php
register_taxonomy(
    'competitions',
    ['leagues', 'cups'],
    [
        'labels' => [
            'name' => 'Competizioni',
            'singular_name' => 'Competizione'
        ],
        'hierarchical' => true,
        'show_ui' => false,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => [
            'slug' => 'competizioni'
        ]
    ]
);