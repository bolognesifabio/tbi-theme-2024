<?php
use TBI\Models\Post_Type as Post_Type;

$options = [
    'labels' => [
        'name' => 'Campionati',
        'singular_name' => 'Campionato',
        'add_new' => 'Aggiungi campionato',
        'add_new_item' => 'Aggiungi un nuovo campionato',
        'edit_item' => 'Modifica campionato',
        'new_item' => 'Nuovo campionato',
        'view_item' => 'Visualizza campionato',
        'view_items' => 'Visualizza campionati',
        'search_items' => 'Cerca campionati',
        'not_found' => 'Nessun campionato trovato',
        'not_found_in_trash' => 'Nessun campionato trovato nel cestino',
        'all_items' => 'Tutti i campionati',
        'archives' => 'Archivio campionati',
        'attributes' => 'Attributi del campionato',
        'insert_into_item' => 'Associa media al campionato',
        'uploaded_to_this_item' => 'Media associati al campionato',
        'featured_image' => 'Logo del campionato',
        'set_featured_image' => 'Carica il logo del campionato',
        'remove_featured_image' => 'Rimuovi il logo del campionato',
        'use_featured_image' => 'Usa come logo del campionato',
        'menu_name' => 'Campionati',
        'filter_items_list' => 'filter_items_list',
        'items_list_navigation' => 'items_list_navigation',
        'items_list' => 'items_list',
        'name_admin_bar' => 'Campionato'
    ],
    'menu_position' => 26,
    'supports' => ['title', 'editor', 'excerpt'],
    'rewrite' => [
        'slug' => 'campionati'
    ]
];

new Post_Type('leagues', $options);