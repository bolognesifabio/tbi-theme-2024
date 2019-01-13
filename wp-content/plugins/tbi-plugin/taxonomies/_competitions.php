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
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => [
            'slug' => 'competizioni'
        ],
        'capabilities' => [
            'manage_terms' => 'manage_competitions_terms',
            'edit_terms' => 'edit_competitions_terms',
            'delete_terms' => 'delete_competitions_terms'
        ]
    ]
);