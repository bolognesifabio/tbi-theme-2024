<?php
use TBI\Controllers\Layout\Menu as Menu_Controller;

$view_model = Menu_Controller::top(); ?>

<tbi-top-menu view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <nav v-if="model">
        <button class="toggle-menu" v-if="!is_viewport_desktop" @click.prevent="toggle_menu">
            <tbi-icon :icon="is_open ? 'times' : 'bars'" />
        </button>

        <transition name="fade">
            <div :class="{ 'layer': true, 'layer--open': is_one_selected }" v-if="is_open"></div>
        </transition>

        <transition name="slide-right">
            <ul class="menu" v-if="is_open">
                <li v-for="menu_item in model.menu" :key="menu_item.ID" :class="{ 'menu__item': true, 'menu__item--open': menu_item.is_selected }">
                    <a v-if="!menu_item.has_children" :href="menu_item.url">{{ menu_item.title }}</a>
                    <a v-if="menu_item.has_children" role="button" @click.prevent="open_sub_menu(menu_item)">
                        {{ menu_item.title }}
                        <tbi-icon icon="chevron-right" />
                    </a>

                    <transition name="sub-menu">
                        <ul v-if="menu_item.is_selected" class="sub-menu">
                            <li v-for="menu_item_child in menu_item.children" :key="menu_item_child.ID" class="sub-menu__item">
                                <a :href="menu_item_child.url">{{ menu_item_child.title }}</a>
                            </li>
                        </ul>
                    </transition>
                </li>
            </ul>
        </transition>
    </nav>
</tbi-top-menu>