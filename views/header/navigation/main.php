<?php
$data = ['menu_items' => []];
$menu_slug = get_term(get_nav_menu_locations()['top-menu'], 'nav_menu')->name;

foreach(wp_get_nav_menu_items($menu_slug) ?: [] as $menu_item) {
    if($menu_item->menu_item_parent) {
        $data['menu_items'][$menu_item->menu_item_parent]->children[] = $menu_item;
    } else {
        $menu_item->children = [];
        $data['menu_items'][$menu_item->ID] = $menu_item;
    }

    $menu_item->is_current = $menu_item->object_id == get_queried_object_id() ? true : false;
};

$data['menu_items'] = array_values($data['menu_items']);

$data['home_url'] = home_url();
$data['template_directory_uri'] = get_template_directory_uri();
?>

<tbi-vue-header data-info='<?= json_encode($data) ?>'></tbi-vue-header>