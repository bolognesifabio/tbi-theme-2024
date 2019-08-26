<?php
namespace TBI\Controllers\Layout;

abstract class Menu {
    public function top() {
        $view_model = [ 'menu' => [] ];

        $top_menu_slug = get_term(get_nav_menu_locations()['top-menu'], 'nav_menu')->name;
        
        foreach (wp_get_nav_menu_items($top_menu_slug) ?: [] as $menu_item) {
            $filtered_menu_item = [
                "ID" => $menu_item->ID,
                "children" => $menu_item->children ?: [],
                "classes" => $menu_item->classes,
                "has_children" => false,
                "is_selected" => $menu_item->object_id == get_queried_object_id(),
                "menu_item_parent" => $menu_item->menu_item_parent,
                "menu_order" => $menu_item->menu_order,
                "title" => $menu_item->title,
                "url" => $menu_item->url,
            ];

            if ($menu_item->menu_item_parent) {
                $parent_menu_item = &$view_model['menu'][$menu_item->menu_item_parent];
                $parent_menu_item["children"][] = $filtered_menu_item;
                $parent_menu_item["has_children"] = true;
                $parent_menu_item["is_selected"] = $filtered_menu_item["is_selected"] ?: $parent_menu_item["is_selected"];
            }
            else {
                $filtered_menu_item["is_selected"] = false;
                $view_model['menu'][$menu_item->ID] = $filtered_menu_item;
            }
        }

        $view_model['menu'] = array_values($view_model['menu']);

        return $view_model;
    }
}