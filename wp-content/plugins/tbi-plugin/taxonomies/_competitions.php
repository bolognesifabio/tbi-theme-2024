<?php
register_taxonomy(
    'competitions',
    ['leagues'],
    [
        'labels' => [
            'name' => 'Competizioni',
            'singular_name' => 'Competizione'
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => true
    ]
);