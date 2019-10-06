<?php
namespace TBI\Controllers\Layout;

abstract class Footer {
    public function menu() {
        $menu_id = get_nav_menu_locations()['footer-menu'];
        $menu = wp_get_nav_menu_items($menu_id) ?: [];
        $view_model = [];

        foreach ($menu as $menu_item) {
            if ($menu_item->menu_item_parent) {
                $view_model[$menu_item->menu_item_parent]->children[$menu_item->ID] = $menu_item;
            } else {
                $menu_item->children = [];
                $view_model[$menu_item->ID] = $menu_item;
            }
        }

        return $view_model;
    }
}