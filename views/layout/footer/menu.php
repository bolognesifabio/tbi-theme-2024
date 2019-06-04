<?php
$footerMenuId = get_nav_menu_locations()['footer-menu'];
$footerMenu = wp_get_nav_menu_items($footerMenuId) ?: [];
$navigation = [];

foreach($footerMenu as $menuItem) {
    if($menuItem->menu_item_parent) {
        $navigation[$menuItem->menu_item_parent]->children[$menuItem->ID] = $menuItem;
    } else {
        $menuItem->children = [];
        $navigation[$menuItem->ID] = $menuItem;
    }
}
foreach($navigation as $menuParent) { ?>
    <ul class="footer__content__list">
        <li class="footer__content__list__heading"><?= $menuParent->title ?></li><?php
        foreach($menuParent->children as $menuChildren) { ?>
            <li class="footer__content__list__element">
                <a href="<?= $menuChildren->url ?>"><?= $menuChildren->title ?></a>
            </li> <?php
        } ?>
    </ul> <?php
}

include "contacts.php"; ?>