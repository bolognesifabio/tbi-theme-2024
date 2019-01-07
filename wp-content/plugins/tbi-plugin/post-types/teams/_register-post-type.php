<?php
register_post_type(
    'teams',
    [
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'hierarchical' => false,
        'menu_icon' => plugins_url('tbi-plugin/img/teams.svg'),
        'labels' => [
            'name' => 'Squadre',
            'singular_name' => 'Squadra',
            'add_new' => 'Aggiungi squadra',
            'add_new_item' => 'Aggiungi una nuova squadra',
            'edit_item' => 'Modifica squadra',
            'new_item' => 'Nuova squadra',
            'view_item' => 'Visualizza squadra',
            'view_items' => 'Visualizza squadre',
            'search_items' => 'Cerca squadre',
            'not_found' => 'Nessuna squadra trovata',
            'not_found_in_trash' => 'Nessuna squadra trovata nel cestino',
            'all_items' => 'Tutte le squadre',
            'archives' => 'Archivio squadre',
            'attributes' => 'Attributi della squadra',
            'insert_into_item' => 'Associa media alla squadra',
            'uploaded_to_this_item' => 'Media associati alla squadra',
            'featured_image' => 'Logo della squadra',
            'set_featured_image' => 'Carica il logo della squadra',
            'remove_featured_image' => 'Rimuovi il logo della squadra',
            'use_featured_image' => 'Usa come logo della squadra',
            'menu_name' => 'Squadre',
            'filter_items_list' => 'filter_items_list',
            'items_list_navigation' => 'items_list_navigation',
            'items_list' => 'items_list',
            'name_admin_bar' => 'Squadra'
        ],
        'supports' => ['thumbnail', 'title']
    ]
);