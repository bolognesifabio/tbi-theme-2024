<?php
use TBI\Models\Post_Type as Post_Type;

$options = [
    'labels' => [
        'name' => 'Partite',
        'singular_name' => 'Partita',
        'add_new' => 'Aggiungi partita',
        'add_new_item' => 'Aggiungi una nuova partita',
        'edit_item' => 'Modifica partita',
        'new_item' => 'Nuova partita',
        'view_item' => 'Visualizza partita',
        'view_items' => 'Visualizza partite',
        'search_items' => 'Cerca partite',
        'not_found' => 'Nessuna partita trovata',
        'not_found_in_trash' => 'Nessuna partita trovata nel cestino',
        'all_items' => 'Tutte le partite',
        'archives' => 'Archivio partite',
        'attributes' => 'Attributi della partita',
        'insert_into_item' => 'Associa media alla partita',
        'uploaded_to_this_item' => 'Media associati alla partita',
        'featured_image' => 'Anteprima della partita',
        'set_featured_image' => 'Carica anteprima della partita',
        'remove_featured_image' => 'Rimuovi anteprima della partita',
        'use_featured_image' => 'Usa come anteprima della partita',
        'menu_name' => 'Partite',
        'filter_items_list' => 'filter_items_list',
        'items_list_navigation' => 'items_list_navigation',
        'items_list' => 'items_list',
        'name_admin_bar' => 'Partita'
    ],
    'menu_position' => 59,
    'supports' => false,
    'rewrite' => [
        'slug' => 'partite'
    ]
];

new Post_Type('fixtures', $options);