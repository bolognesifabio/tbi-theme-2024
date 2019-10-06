<?php
use TBI\Controllers\Layout\Footer as Footer_Controller;

$view_model = Footer_Controller::menu();

foreach($view_model as $menu_item) { ?>
    <ul class="footer__content__list">
        <li class="footer__content__list__heading"><?= $menu_item->title ?></li><?php
        
        foreach($menu_item->children as $menu_item_child) { ?>
            <li class="footer__content__list__item">
                <a class="footer__content__list__item__link" href="<?= $menu_item_child->url ?>">
                    <?= $menu_item_child->title ?>
                </a>
            </li> <?php
        } ?>
    </ul> <?php
} ?>

<ul class="footer__content__list footer__content__list--contacts">
    <li class="footer__content__list__heading">Contatti</li>
    <li class="footer__content__list__item">
        <tbi-icon class="footer__content__list__item__icon" icon="map-marker-alt"></tbi-icon>
        <span class="footer__content__list__item__text">via Parini, 54 - 21047 Saronno (VA) Italia</span>
    </li>
    <li class="footer__content__list__item">
        <tbi-icon class="footer__content__list__item__icon" icon="envelope"></tbi-icon>
        <span class="footer__content__list__item__text">segreteria@tchoukball.it</span>
    </li>
    <li class="footer__content__list__item">
        <tbi-icon class="footer__content__list__item__icon" icon="envelope"></tbi-icon>
        <span class="footer__content__list__item__text">federazione@tchoukball.it</span>
    </li>
</ul>