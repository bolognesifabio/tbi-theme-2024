<?php
use TBI\Models\Post_Type as Post_Type;

$options = [
    'labels' => [
        'name' => 'Coppe',
        'singular_name' => 'Coppa',
        'add_new' => 'Aggiungi coppa',
        'add_new_item' => 'Aggiungi una nuova coppa',
        'edit_item' => 'Modifica coppa',
        'new_item' => 'Nuova coppa',
        'view_item' => 'Visualizza coppa',
        'view_items' => 'Visualizza coppe',
        'search_items' => 'Cerca coppe',
        'not_found' => 'Nessuna coppa trovata',
        'not_found_in_trash' => 'Nessuna coppa trovata nel cestino',
        'all_items' => 'Tutte le coppe',
        'archives' => 'Archivio coppe',
        'attributes' => 'Attributi della coppa',
        'insert_into_item' => 'Associa media alla coppa',
        'uploaded_to_this_item' => 'Media associati alla coppa',
        'featured_image' => 'Logo della coppa',
        'set_featured_image' => 'Carica il logo della coppa',
        'remove_featured_image' => 'Rimuovi il logo della coppa',
        'use_featured_image' => 'Usa come logo della coppa',
        'menu_name' => 'Coppe',
        'filter_items_list' => 'filter_items_list',
        'items_list_navigation' => 'items_list_navigation',
        'items_list' => 'items_list',
        'name_admin_bar' => 'Coppe'
    ],
    'menu_position' => 27,
    'supports' => ['title'],
    'rewrite' => [
        'slug' => 'coppe'
    ]
];

new Post_Type('cups', $options);