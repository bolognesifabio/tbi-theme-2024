<?php
$this->type_name = $type_name;

$default_options = [
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'menu_icon' => plugins_url('tbi-plugin/img/' . $type_name . '.svg'),
    'supports' => ['title', 'editor', 'thumbnail']
];

register_post_type($type_name, array_merge($default_options, $options));

if ($taxonomy_slug_prefix) {
    $this->taxonomy_slug_prefix = $taxonomy_slug_prefix;
    add_action('post_updated', [$this, 'update_taxonomy_term'], 10, 2);
}