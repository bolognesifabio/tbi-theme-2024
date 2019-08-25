<?php
namespace TBI\Controllers\Layout;

abstract class Menu {
    public function top() {
        $view_model = [
            'menu' => [],
            'home_page_url' => home_url(),
            'template_directory_uri' => get_template_directory_uri()
        ];

        $top_menu_slug = get_term(get_nav_menu_locations()['top-menu'], 'nav_menu')->name;
        
        foreach (wp_get_nav_menu_items($top_menu_slug) ?: [] as $menu_item) {
            if ($menu_item->menu_item_parent) {
                $view_model['menu'][$menu_item->menu_item_parent]->children[] = $menu_item;
            } else {
                $menu_item->children = [];
                $view_model['menu'][$menu_item->ID] = $menu_item;
            }
        }

        $view_model['menu'] = array_values($view_model['menu']);

        return $view_model;
    }
}