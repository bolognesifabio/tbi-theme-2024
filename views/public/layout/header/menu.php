<?php
use TBI\Controllers\Layout\Header as Header_Controller;

$view_model = new Header_Controller;
$view_model = $view_model->menu(); ?>

<tbi-header-menu view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <nav v-if="model" class="nav">
        <button class="nav__toggle" v-if="!is_viewport_desktop" @click.prevent="toggle_menu">
            <tbi-icon :icon="is_open ? 'times' : 'bars'"></tbi-icon>
        </button>

        <transition name="fade">
            <div class="nav__layer" v-if="is_open && !is_viewport_desktop"></div>
        </transition>

        <transition :name="!is_viewport_desktop ? 'slide-right' : ''">
            <ul class="nav__menu" v-if="is_open || is_viewport_desktop">
                <li
                    v-for="menu_item in model.menu"
                    :key="menu_item.ID"
                    :class="{ 'nav__menu__item': true, 'nav__menu__item--open': menu_item.is_selected }"
                >
                    <button
                        v-if="menu_item.has_children"
                        class="nav__menu__item__cta"
                        @click.prevent="toggle_sub_menu(menu_item)"
                    >
                        {{ menu_item.title }}
                        <tbi-icon
                            :icon="!is_viewport_desktop ? 'caret-right' : 'caret-down'"
                            class="nav__menu__item__cta__icon"
                        ></tbi-icon>
                    </button>
                    <a v-else :href="menu_item.url" class="nav__menu__item__cta">{{ menu_item.title }}</a>

                    <transition name="nav__menu__item__sub-menu">
                        <ul v-if="menu_item.is_selected" class="nav__menu__item__sub-menu">
                            <li
                                v-for="menu_item_child in menu_item.children"
                                class="nav__menu__item__sub-menu__item"
                                :key="menu_item_child.ID"
                            >
                                <a :href="menu_item_child.url" class="nav__menu__item__sub-menu__item__cta">
                                    {{ menu_item_child.title }}
                                </a>
                            </li>
                        </ul>
                    </transition>
                </li>
            </ul>
        </transition>
    </nav>
</tbi-header-menu>