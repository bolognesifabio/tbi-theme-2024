<?php
use TBI\Controllers\Layout\Menu as Menu_Controller;

$view_model = Menu_Controller::top(); ?>

<tbi-top-menu view_model='<?= json_encode($view_model) ?>' inline-template>
    <nav v-if="model">
        <ul class="menu">
            <li v-for="menu_item in model.menu">
                <a v-if="!menu_item.children.length" :href="menu_item.url">{{ menu_item.title }}</a>

                <button v-if="menu_item.children.length" @click.prevent="toggle_sub_menu(menu_item.ID)">
                    {{ menu_item.title }}
                </button>

                <ul v-if="menu_item.children.length" class="sub-menu">
                    <li v-for="menu_item_child in menu_item.children">
                        <a :href="menu_item_child.url">{{ menu_item_child.title }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</tbi-top-menu>