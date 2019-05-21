export default `
    <div class="header">
        <div class="header__logo">
            <a :href="info.home_url">
                <img :src="info.template_directory_uri + '/assets/img/tbi-logo-header.png'" class="header__logo--desktop" />
                <img :src="info.template_directory_uri + '/assets/img/tbi-logo-header-mobile.png'" class="header__logo--mobile" />
            </a>
        </div>

        <div class="header__contents">
            <div class="header__contents__row header__contents__row--top">
                <div class="header__contents__row__open-menu" @click.prevent="toggle_menu">
                    <i :class="['fas', {'fa-bars': !is_menu_open}, {'fa-times': is_menu_open}]"></i>
                    <span class="text">{{ is_menu_open ? 'Chiudi' : 'Menu'}}</span>
                </div>
                <div :class="['header__contents__row__menu', {'open': is_menu_open}]">
                    <nav class="header__contents__row__menu__container">
                        <ul class="header__contents__row__menu__element">
                            <li v-for="menu_item in info.menu_items" :class="render_menu_item_classes(menu_item)">
                                <a v-if="menu_item.children.length > 0" href="#" @click.prevent="toggle_sub_menu(menu_item.ID)">{{ menu_item.title }}</a>
                                <a v-if="menu_item.children.length < 1" :href="menu_item.url">{{ menu_item.title }}</a>
                                <ul class="sub-menu">
                                    <li v-for="menu_item_child in menu_item.children" :class="render_menu_item_classes(menu_item_child)">
                                        <a :href="menu_item_child.url">{{ menu_item_child.title }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <ul class="header__contents__row__social">
                    <a href="https://www.instagram.com/tchoukballitalia/" target="_blank">
                        <li class="header__contents__row__social__item header__contents__row__social__item--instagram">
                            <i class="fab fa-instagram"></i>
                        </li>
                    </a>
                    <a href="https://www.flickr.com/people/tchoukballitalia/" target="_blank">
                        <li class="header__contents__row__social__item header__contents__row__social__item--flickr">
                            <i class="fab fa-flickr"></i>
                        </li>
                    </a>
                    <a href="https://www.facebook.com/tchoukballitalia" target="_blank">
                        <li class="header__contents__row__social__item header__contents__row__social__item--facebook">
                            <i class="fab fa-facebook-f"></i>
                        </li>
                    </a>
                    <a href="https://www.youtube.com/user/youtchouk" target="_blank">
                        <li class="header__contents__row__social__item header__contents__row__social__item--youtchouk">
                            <i class="fab fa-youtube"></i><span class="text">YouTchouk</span>
                        </li>
                    </a>
                </ul>
            </div>

            <div class="header__contents__row header__contents__row--bottom">
                <div class="header__contents__row__clubs">
                    <img v-for="img_name in 14" :src="info.template_directory_uri + '/assets/img/club/' + (img_name < 10 ? '0' + img_name : img_name) + '.jpg'" />
                </div>
                <div :class="['header__contents__row__search-form', {'open': is_search_open}]">
                    <form class="search-form" role="search" method="get" :action="info.home_url + '/'">
                        <input type="text" value=""  class="search-form__text" name="s" placeholder="Cerca" />
                        <button type="submit" value="" class="search-form__submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="header__contents__row__open-search" @click.prevent="toggle_search">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
    </div>
`