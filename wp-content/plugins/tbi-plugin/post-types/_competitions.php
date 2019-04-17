<?php
use TBI\Models\Post_Type as Post_Type;

$options = [
    'labels' => [
        'name' => 'Competizioni',
        'singular_name' => 'Competizione',
        'add_new' => 'Aggiungi competizione',
        'add_new_item' => 'Aggiungi una nuova competizione',
        'edit_item' => 'Modifica competizione',
        'new_item' => 'Nuova competizione',
        'view_item' => 'Visualizza competizione',
        'view_items' => 'Visualizza competizioni',
        'search_items' => 'Cerca competizioni',
        'not_found' => 'Nessuna competizione trovata',
        'not_found_in_trash' => 'Nessuna competizione trovata nel cestino',
        'all_items' => 'Tutte le competizioni',
        'archives' => 'Archivio competizioni',
        'attributes' => 'Attributi della competizione',
        'insert_into_item' => 'Associa media alla competizione',
        'uploaded_to_this_item' => 'Media associati alla competizione',
        'featured_image' => 'Logo della competizione',
        'set_featured_image' => 'Carica il logo della competizione',
        'remove_featured_image' => 'Rimuovi il logo della competizione',
        'use_featured_image' => 'Usa come logo della competizione',
        'menu_name' => 'Competizioni',
        'name_admin_bar' => 'Competizioni'
    ],
    'menu_position' => 25,
    'supports' => ['thumbnail', 'title'],
    'rewrite' => [
        'slug' => 'competizioni'
    ]
];

new Post_Type('competitions', $options, 'competition');