<?php
register_post_type(
    'clubs',
    [
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'hierarchical' => false,
        'menu_icon' => plugins_url('tbi-plugin/img/clubs.svg'),
        'labels' => [
            'name' => 'Società',
            'singular_name' => 'Società',
            'add_new' => 'Aggiungi società',
            'add_new_item' => 'Aggiungi una nuova società',
            'edit_item' => 'Modifica società',
            'new_item' => 'Nuova società',
            'view_item' => 'Visualizza società',
            'view_items' => 'Visualizza società',
            'search_items' => 'Cerca società',
            'not_found' => 'Nessuna società trovata',
            'not_found_in_trash' => 'Nessuna società trovata nel cestino',
            'all_items' => 'Tutte le società',
            'archives' => 'Archivio società',
            'attributes' => 'Attributi della società',
            'insert_into_item' => 'Associa media alla società',
            'uploaded_to_this_item' => 'Media associati alla società',
            'featured_image' => 'Logo della società',
            'set_featured_image' => 'Carica il logo della società',
            'remove_featured_image' => 'Rimuovi il logo della società',
            'use_featured_image' => 'Usa come logo della società',
            'menu_name' => 'Società',
            'name_admin_bar' => 'Società'
        ],
        'supports' => ['thumbnail', 'title'],
        'rewrite' => [
            'slug' => 'societa'
        ]
    ]
);